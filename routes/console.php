<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Define o comando 'inspire'
Artisan::command('inspire', function () {
      // O método 'comment' é usado para exibir uma mensagem no console
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
