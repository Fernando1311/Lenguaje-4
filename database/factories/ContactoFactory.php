<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * $table->string('nombre');
    *   $table->string('apellido');
     *       $table->string('correo_electronico');
      *      $table->string('telefono');
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstname(),
            'apellido'=>fake()->lastname(),
            'correo_electronico'=>fake()->unique()->safeEmail(),
            'telefono'=>fake()->phoneNumber(),
        ];
    }
}
