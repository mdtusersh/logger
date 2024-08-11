<?php

namespace Tuser\Logger\Loggers;

class TextFileLogger extends AbstractLogger
{
    public function __construct(protected string $level, protected string $filePath) { }

    public function log(string $message): void
    {
        file_put_contents(
            $this->filePath,
            $this->formatMessage($this->level, $message) . PHP_EOL,
            FILE_APPEND
        );
    }
}
