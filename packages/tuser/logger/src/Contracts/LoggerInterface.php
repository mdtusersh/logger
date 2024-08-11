<?php

namespace Tuser\Logger\Contracts;

use Throwable;

interface LoggerInterface
{
    public function log(string $message): void;
}
