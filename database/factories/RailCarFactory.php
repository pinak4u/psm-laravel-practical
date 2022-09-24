<?php

namespace Database\Factories;

use App\Models\RailCar;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RailCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $areaArray =  $areaArray = [
            RailCar::AREA_YARD,
            RailCar::AREA_NORTH_GATE,
            RailCar::AREA_SOUTH_SIDE,
            RailCar::AREA_PLATFORM_1,
            RailCar::AREA_PLATFORM_2,
            RailCar::AREA_PLATFORM_3
        ];
        $statusArray = [
            RailCar::STATUS_PARKED,
            RailCar::STATUS_LOADING,
            RailCar::STATUS_LOADED,
            RailCar::STATUS_SHIPPED,
            RailCar::STATUS_ARCHIVED,
        ];
        return [
            'name' => $this->faker->name(),
            'user_id' => random_int(2,10),
            'area' => $this->faker->randomElement($areaArray),
            'status' => $this->faker->randomElement($statusArray),
            'due_date' => Carbon::now()->addDays(rand(1,4)),
            'arrival_date' => Carbon::now()->addDays(rand(5,10)),
        ];
    }
}
