<?php

declare(strict_types=1);

namespace Octo\View;

use Latte\Engine;
use Octo\Core\Services\RequestTimer;

final class Renderer
{
    private static Engine $engine;

    public static function init(): void
    {
        self::$engine = new Engine();
        self::$engine->setTempDirectory(__DIR__ . '/../../temp');
    }

    public static function renderBar(array $params = []): void
    {
        self::$engine->render(__DIR__ . '/Templates/bar.latte', $params);
    }
}