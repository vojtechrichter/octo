<?php

declare(strict_types = 1);

namespace Octo\Core\EventHandlers;

use Octo\Core\Services\RequestTimer;
use Octo\View\Renderer;

class ShutdownHandler
{
    private static RequestTimer $request_timer;

    public static function register(
        RequestTimer $request_timer
    ): void
    {
        self::$request_timer = $request_timer;

        register_shutdown_function([ShutdownHandler::class, 'onExecutionShutdown']);
    }

    private static function onExecutionShutdown(): void
    {
        $template_params = [];
        $template_params['request_took_ms'] = self::$request_timer->measureRequestTime();

        Renderer::renderBar($template_params);
    }
}