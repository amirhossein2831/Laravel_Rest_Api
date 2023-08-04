<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['P', 'B']);                                //P -->person      B -->business
        $name = $type === 'P' ? $this->faker->name():$this->faker->company();

        return [
            'name' => $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'address'=> $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state'=>$this->faker->state(),
            'postal_code'=> $this->faker->postcode()
        ];
    }
}
