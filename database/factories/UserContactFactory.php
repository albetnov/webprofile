<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserContact;

class UserContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_contact' => $this->faker->name(),
            'email_contact' => $this->faker->unique()->safeEmail(),
            'subject_contact' => $this->faker->text(),
            'message_contact' => $this->faker->text(),
            'posted_at' => now()
        ];
    }
}
