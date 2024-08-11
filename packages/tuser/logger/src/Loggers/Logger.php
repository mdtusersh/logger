<?php

namespace Tuser\Logger\Loggers;

use Tuser\Logger\Enums\LoggerLevel;

class Logger
{
    public static function emergency(string $message): void
    {
        self::medium(LoggerLevel::Emergency, $message);
    }

    public static function alert(string $message): void
    {
        self::medium(LoggerLevel::Alert, $message);
    }

    public static function critical(string $message): void
    {
        self::medium(LoggerLevel::Critical, $message);
    }

    public static function error(string $message): void
    {
        self::medium(LoggerLevel::Error, $message);
    }

    public static function warning(string $message): void
    {
        self::medium(LoggerLevel::Warning, $message);
    }

    public static function notice(string $message): void
    {
        self::medium(LoggerLevel::Notice, $message);
    }

    public static function info(string $message): void
    {
        self::medium(LoggerLevel::Info, $message);
    }

    public static function debug(string $message): void
    {
        self::medium(LoggerLevel::Debug, $message);
    }

    private static function medium(LoggerLevel $level, string $message): void
    {
        $loggerMedium = config('logger.default');

        if($loggerMedium == 'stack') {
            $loggerMediums = config('logger.mediums.stack.mediums');
            foreach ($loggerMediums as $loggerMedium) {
                self::log($loggerMedium, $level, $message);
            }
        } else {
            self::log($loggerMedium, $level, $message);
        }
    }

    private static function log(string $loggerMedium, LoggerLevel $level, string $message): void
    {
        switch ($loggerMedium) {
            case 'text':
                $file_path = config('logger.mediums.text.path');
                (new TextFileLogger($level->value, $file_path))->log($message);
                break;

            case 'json':
                $file_path = config('logger.mediums.json.path');
                (new JsonFileLogger($level->value, $file_path))->log($message);
                break;

            case 'stream':
                $stream = config('logger.mediums.stream.stream');
                (new StreamLogger($level->value, $stream))->log($message);
                break;

            case 'database':
                (new DatabaseLogger($level->value))->log($message);
                break;

            default:
                throw new \InvalidArgumentException('Invalid config provided.');
        }
    }
}
