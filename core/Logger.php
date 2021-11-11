<?php

declare(strict_types=1);

namespace Core;

use Psr\Log\LoggerInterface;
use Stringable;

class Logger implements LoggerInterface
{
    /**
     * @inheritDoc
     */
    public function emergency(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function alert(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function critical(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function error(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function warning(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function notice(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function info(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function debug(Stringable|string $message, array $context = []): void
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function log($level, Stringable|string $message, array $context = []): void
    {
        echo '<pre>';
        echo 'Error level: ', $level, '<br/><br/>';
        echo $message, '<br/><br/>';
        print_r($context);
        echo '</pre>';
        die();
    }
}