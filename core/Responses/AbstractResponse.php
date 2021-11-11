<?php

declare(strict_types=1);

namespace Core\Responses;

abstract class AbstractResponse
{
    abstract public function sendHeaders(): void;

    abstract public function sendBody(): void;

    final public function send(): void
    {
        $this->sendHeaders();
        $this->sendBody();
    }
}
