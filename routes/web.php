<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (){
    Logger::emergency('This is emergency log');
    Logger::alert('This is alert log');
    Logger::critical('This is critical log');
    Logger::error('This is error log');
    Logger::warning('This is warning log');
    Logger::notice('This is notice log');
    Logger::info('This is info log');
    Logger::debug('This is debug log');
});
