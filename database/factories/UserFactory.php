<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'pseudo' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'numero_adherent' => $this->faker->unique()->numerify('adh-2045-###'),
            'adresse' => $this->faker->streetAddress,
            'code_postal' => $this->faker->postcode,
            'ville' => $this->faker->city,
            'date_adhesion' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

        ];
    }
}
