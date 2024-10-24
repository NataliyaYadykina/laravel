<?php

namespace App\Http\Middleware;

use App\Models\LogHW8;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class DataLoggerHW8
{
    private $start_time;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response) // Функция, которая вызывается после посылки ответа пользователю
    {
        if (env('API_DATALOGER', true)) { // Если в env файле прописана опция API_DATALOGER = true, используем логирование
            if (env('API_DATALOGER_USE_DB', true)) { // Если в env файле прописана опция API_DATALOGER_USE_DB = true,то для сохранения используем БД иначе пишем просто в файл
                $endTime = microtime(true); // Получаем текущее время в секундах с микросекундами
                $duration = $endTime - LARAVEL_START; // Вычисляем продолжительность
                $log = new LogHW8();
                $log->time = gmdate('Y-m-d H:i:s');
                $log->duration = floatval(number_format($duration, 3, '.', ''));
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save(); // Сохранили в базу нашу запись
            } else { // На всякий случай, если опция записи в базу данных не доступна, запишем в файл
                $endTime = microtime(true); // Получаем текущее время в секундах с микросекундами
                $duration = $endTime - LARAVEL_START; // Вычисляем продолжительность
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $dataToLog = new LogHW8();
                $dataToLog = 'Time: ' . gmdate('Y-m-d H:i:s') . "\n";
                $dataToLog .= 'Duration: ' . floatval(number_format($duration, 3, '.', '')) . "\n";
                $dataToLog .= 'Ip Address: ' . $request->ip() . "\n";
                $dataToLog .= 'URL: ' . $request->fullUrl() . "\n";
                $dataToLog .= 'Method: ' . $request->method() . "\n";
                $dataToLog .= 'Input: ' . $request->getContent() . "\n";
                File::append(storage_path('logs_hw8' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("*", 20) . "\r\n"); // Запись в файл
            }
        }
    }
}
