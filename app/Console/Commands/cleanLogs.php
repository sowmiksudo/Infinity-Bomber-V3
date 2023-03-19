<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class cleanLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean application log files that take too much space';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $bombing = base_path('storage/logs/bombingLogs.log');
        if (file_exists($bombing)) {
            File::delete($bombing);
            File::put($bombing, "");
        }

        $laravel = base_path('storage/logs/laravel.log');
        if (file_exists($laravel)) {
            File::delete($laravel);
            File::put($laravel, "");
        }

        return Command::SUCCESS;
    }
}
