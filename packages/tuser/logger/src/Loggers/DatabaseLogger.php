<?php

namespace Tuser\Logger\Loggers;

use Illuminate\Support\Facades\DB;

class DatabaseLogger extends AbstractLogger
{
    public function __construct(protected string $level) { }

    public function log(string $message): void
    {
        DB::table('logs')->insert([
            'level' => $this->level,
            'message' => trim($message),
        ]);
    }
}
