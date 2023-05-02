<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * $table->string('texto');
          *  $table->datetime('fecha');
           * $table->unsignedBigInteger('contacto_id');
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'texto'=>fake()->text(),
            'fecha'=>fake()->datetime(),
            'contacto_id'=>fake()->numberbetween(1,150)
        ];
    }
}
