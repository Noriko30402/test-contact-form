<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{


    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' =>$this->faker->randomElement([1, 2, 3, 4, 5]),
            'first_name' => $this->faker->firstName,
            'last_name' =>$this->faker->lastName,
            'gender' => $this->faker->randomElement(['男', '女','その他']),
            'email' => $this->faker->unique()->safeEmail,
            'tell' =>$this->faker->phoneNumber,
            'address' =>$this->faker->address,
            'building' => $this->faker->company . 'ビル',
            'detail' => $this->faker->sentence(),

        ];
    }
}



