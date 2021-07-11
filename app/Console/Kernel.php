<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('App\Http\Controllers\JuegoController@terminarColas')
            ->description("Terminar Colas")
            ->everyMinute();
        $schedule->call('App\Http\Controllers\JuegoController@sumarPuntosDeVictoria')
            ->description("Puntos de victoria")
            ->hourly();
        $schedule->call('App\Http\Controllers\JuegoController@aplicarPoliticas')
            ->description("Politicas")
            ->everyMinute();
        // ->weeklyOn(1, '2:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
