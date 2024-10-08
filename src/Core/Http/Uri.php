<?php

declare(strict_types=1);

namespace Octo\Core\Http;

final class Uri
{
    private string $host;
    private string $port;
    private string $path;
    private string $query;

    public function __construct()
    {
        $this->host = $_SERVER['HTTP_HOST']; // TODO: remove port
        $this->port = $_SERVER['SERVER_PORT'];
        $this->path = $_SERVER['REQUEST_URI']; // TODO: remove query string
        $this->query = $_SERVER['QUERY_STRING']; // TODO: parse as array
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): string
    {
        return $this->port;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): string
    {
        return $this->query;
    }
}