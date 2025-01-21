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
            'gender' => $this->faker->randomElement(['1', '2','3']),
            'email' => $this->faker->safeEmail(),
            'tell' =>$this->faker->phoneNumber,
            'address' => $this->faker->city() . $this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->sentence(),

        ];
    }
}

// 'category_id' => $this->faker->numberBetween(1, 5),
//  'building' => $this->faker->company . 'ビル',
//  address' =>$this->faker->address,



