<?php

namespace Tuser\Logger\Loggers;

class StreamLogger extends AbstractLogger
{
    public function __construct(protected string $level, protected $stream) { }

    public function log(string $message): void
    {
        if (is_resource($this->stream)) {
            fwrite($this->stream, $this->formatMessage($this->level, $message) . PHP_EOL);
        } else {
            throw new \InvalidArgumentException('Invalid stream provided.');
        }
    }
}

