<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'date' => Carbon::now(),
            'time' => Carbon::now(),
            'status' => $this->faker->word(),
            'note' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'client_id' => function () {
                return Client::factory()->create()->id;
            },
        ];
    }
}
