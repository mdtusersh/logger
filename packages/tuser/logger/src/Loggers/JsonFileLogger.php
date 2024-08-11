<?php

namespace Tuser\Logger\Loggers;

class JsonFileLogger extends AbstractLogger
{
    public function __construct(protected string $level, protected string $filePath) { }

    public function log(string $message): void
    {
        if (file_exists($this->filePath)) {
            $jsonData = file_get_contents($this->filePath);
            $dataArray = json_decode($jsonData, true);
        } else {
            $dataArray = [];
        }

        $dataArray[] = [
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'level' => $this->level,
            'message' => $message
        ];

        $updatedJsonData = json_encode($dataArray, JSON_PRETTY_PRINT);

        file_put_contents($this->filePath, $updatedJsonData);
    }
}
