<?php

namespace Database\Seeders;

use App\Models\Bombing;
use Database\Factories\BombingFactory;
use Illuminate\Database\Seeder;

class BombingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = 'Bombing';

    public function run()
    {
        // Bombing::factory()->count(10)->create();
    }
}
