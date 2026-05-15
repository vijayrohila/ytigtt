<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Pick winners every day at 00:05 UTC.
Schedule::command('creator-links:pick-winners')
    //->dailyAt('00:05')
    ->timezone('UTC')
    ->withoutOverlapping();
