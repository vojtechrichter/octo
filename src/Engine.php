<?php

declare(strict_types = 1);

namespace Octo;

use Octo\Core\EventHandlers\ShutdownHandler;
use Octo\Core\Services\RequestExtractor;
use Octo\Core\Services\RequestTimer;
use Octo\View\Renderer;

final class Engine
{
    public static function start(): void
    {
        Renderer::init();

        $request_timer = new RequestTimer();
        $request_extractor = new RequestExtractor();
        ShutdownHandler::register($request_timer, $request_extractor);
    }
}