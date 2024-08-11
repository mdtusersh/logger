<?php

namespace Tuser\Logger\Loggers;

use Tuser\Logger\Contracts\LoggerInterface;

abstract class AbstractLogger implements LoggerInterface
{
    protected function formatMessage(string $level, string $message): string
    {
        return sprintf('[%s] [%s] %s', now()->format('Y-m-d H:i:s'), $level, trim($message));
    }
}
