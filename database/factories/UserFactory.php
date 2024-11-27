<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory {
    protected static ?string $password;

    public function definition(): array {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'descricao_perfil' => $this->faker->sentence(),
            'remember_token' => Str::random(10),
            'user_type' => $this->faker->randomElement(['cliente', 'funcionario']),
            'user_class' => $this->faker->randomElement(['manutencao', 'vendedor']),
            'CLIENTE_DATA_NASC' => $this->faker->date('Y-m-d', '-18 years'),
            'CLIENTE_ENDERECO' => $this->faker->streetAddress(),
            'CLIENTE_CEP' => $this->faker->postcode(),
            'CLIENTE_CIDADE' => $this->faker->city(),
            'CLIENTE_ESTADO' => $this->faker->state(),
            'CLIENTE_PAIS' => $this->faker->country(),
        ];
    }

    public function unverified(): static {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}