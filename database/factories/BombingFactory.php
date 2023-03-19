<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BombingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'target'=>"01". $this->faker->randomNumber(9),
            'note'=>$this->faker->text(50),
            'ip'=>$this->faker->ipv4(),
            'amount'=>$this->faker->randomNumber(4),
            'sent'=>$this->faker->randomNumber(3),
            'status'=>'pending',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
    }
}
