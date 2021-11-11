<?php

declare(strict_types=1);

namespace Core;

class Request
{
    private array $server;

    public function __construct()
    {
        $this->server = $_SERVER;
    }

    public function getRemoteIp(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public function getRefererUri(): string
    {
        return !empty($this->server['HTTP_REFERER']) ? $this->server['HTTP_REFERER'] : $this->server['REQUEST_URI'];
    }
}
