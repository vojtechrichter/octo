<?php

declare(strict_types = 1);

namespace Octo;

use Octo\Core\EventHandlers\ShutdownHandler;
use Octo\Core\Services\RequestTimer;
use Octo\View\Renderer;

final class Engine
{
    public static function start(): void
    {
        Renderer::init();

        $request_timer = new RequestTimer();
        ShutdownHandler::register($request_timer);
    }
}