<?php

namespace Database\Factories\Src\User\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;

class UserORMModelFactory extends Factory
{

    protected $model = UserORMModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'        => $this->faker->name,
            'email'            => $this->faker->unique()->safeEmail,
            'password'         => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number'     => "",
            'id_configuration' => 1,
            'id_role'          => 11,
            'verified'         => 1,
            'active'           => 1
        ];
    }
}
