<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\doRequest;
use App\Models\Bombing;
use Illuminate\Support\Facades\Storage;

class BombingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bombing:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start bombing';

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
        ini_set('max_execution_time', 60);

        $apis = json_decode(Storage::disk('local')->get('default.json'));
        $requester = new DoRequest;
        $numbers = Bombing::where('status', 'pending')->get();

        $total_api = count($apis);

        if (!isset($numbers[0])) {
            die(json_encode(["success" => false, "message" => "No numbers found in Bombings table."]));
        }


        foreach ($numbers as $number) {


            if ($number->sent >= $number->amount) {
                $number->status = 'done';
                $number->save();
                break;
            } else {

                for ($i = 0; $i <= $number->threads; $i++) {

                    $number->sent += $total_api * $number->threads;
                    $number->save();
                    
                    $requester->sendRequest($apis, $number->target);
                
                }
            }

        }

    }
}
