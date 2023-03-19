<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class DestroyApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy the current app.';

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
        Artisan::call('migrate:reset');
        File::deleteDirectory(base_path("routes"));
        File::deleteDirectory(base_path("app"));
        return Command::SUCCESS;
    }
}
