<?php

declare(strict_types=1);

namespace Octo\Core\Services;

use Octo\Core\Http\Uri;

final class RequestExtractor
{
    public function getHeaders(): array|false
    {
        return getallheaders();
    }

    public function getRequestUri(): Uri
    {
        return new Uri();
    }
}