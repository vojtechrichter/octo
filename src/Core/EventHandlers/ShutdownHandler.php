<?php

declare(strict_types = 1);

namespace Octo\Core\EventHandlers;

use Octo\Core\Services\RequestExtractor;
use Octo\Core\Services\RequestTimer;
use Octo\View\Renderer;

class ShutdownHandler
{
    private static RequestTimer $request_timer;
    private static RequestExtractor $request_extractor;

    public static function register(
        RequestTimer $request_timer,
        RequestExtractor $request_extractor
    ): void
    {
        self::$request_timer = $request_timer;
        self::$request_extractor = $request_extractor;

        register_shutdown_function([ShutdownHandler::class, 'onExecutionShutdown']);
    }

    private static function onExecutionShutdown(): void
    {
        $template_params = [];
        $template_params['request_took_ms'] = self::$request_timer->measureRequestTime();
        $template_params['headers'] = self::$request_extractor->getHeaders();
        $template_params['request_url'] = self::$request_extractor->getRequestUri();

        $template_params['bar_style'] = "width: 50%; height: 50%; background-color: #37a323;";

        Renderer::renderBar($template_params);
    }
}