<?php

namespace App\Console;

use App\Company;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\PayDividendsCommand;
use App\Console\Commands\RandomEventCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Spatie\MigrateFresh\Commands\MigrateFresh::class,
        PayDividendsCommand::class,
        RandomEventCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(PayDividendsCommand::class)->everyMinute();

        $schedule->call(RandomEventCommand::class)->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
