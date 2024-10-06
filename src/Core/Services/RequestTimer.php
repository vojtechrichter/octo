<?php

declare(strict_types=1);

namespace Octo\Core\Services;

use Octo\View\Renderer;

final class RequestTimer
{
    private float $request_start_time;
    private int $time_decimal_point_precision;

    public function __construct()
    {
        $this->request_start_time = microtime(true);
        $this->time_decimal_point_precision = 3;
    }

    public function measureRequestTime(): float
    {
        $time_in_ms = round((microtime(true) - $this->request_start_time) * 1000, $this->time_decimal_point_precision);

        return $time_in_ms;
    }

    public function setDecimalPointPrecision(int $precision): void
    {
        $this->time_decimal_point_precision = $precision;
    }
}