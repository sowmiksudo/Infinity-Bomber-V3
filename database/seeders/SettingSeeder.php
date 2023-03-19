<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'public_bombing_page'=>true,
            'use_multi_threads'=>true,
            'did_run_before'=>false,
            'notice'=>'Notice for development',
            'protect_notice'=>'Notice for development!',
            'share_text'=>"Hi there! Thanks for using our bomber."
        ]);
        
    }
}
