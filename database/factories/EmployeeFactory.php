<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 11),
            'name' => $this->faker->firstName,
            'birthday_date'=> $this->faker->date(),
            'blood'=> $this->faker->randomElement(['A', 'B', 'O', 'AB']),
            'status'=> $this->faker->randomElement(['Active', 'InActive']),
            'start_date'=> $this->faker->date(),
            'end_date'=> $this->faker->date(),
            'address'=> $this->faker->address,
            'phone_number'=> $this->faker->phoneNumber,
            'bank_number'=> $this->faker->unique()->bankAccountNumber,
            'bank'=> $this->faker->company,
            'gender'=> $this->faker->randomElement(['L', 'P']),
        ];
    }
}
