<?php

namespace App\Providers;

use App\Jobs\SyncNewsS10;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Schedule $schedule): void
    {
        // Вызов метода для планирования задач
        $this->schedule($schedule);
    }
    protected function schedule(Schedule $schedule): void
    {
        // Здесь добавляем задачи для планировщика
        $schedule->call(function () {
            Log::info('Callback executed');
        })->everyMinute();

        $schedule->command('app:app-dump-database-s10')->everyMinute();

        $schedule->job(SyncNewsS10::class)->everyMinute();

        // Выполняем команду через терминал, в данном случае powershell в windows
        $schedule->exec('powershell -Command "New-Item -Path storage/logs/test_s10.log -ItemType File -Force"')->everyMinute();

        // Пример задания, которое выполняется ежедневно
        // $schedule->command('your:command')->daily();

        // Пример задания для Job, выполняющегося каждую минуту
        // $schedule->job(new \App\Jobs\YourJobName)->everyMinute();
    }
}
