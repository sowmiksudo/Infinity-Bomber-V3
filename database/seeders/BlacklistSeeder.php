<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlacklistSeeder extends Seeder
{
    public function run()
    {
        DB::table('blacklists')->insert([
            "number"=>"01819400400",
            "message"=>"The number is blacklisted by Admin."
        ]);
    }
}
