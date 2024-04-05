<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class ClearSession extends Command
{
    protected $signature = 'session:clear';
    protected $description = 'Clear all session data';

    public function handle()
    {
        Session::flush();
        $this->info('Session data cleared successfully.');
    }
}
