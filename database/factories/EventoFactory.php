<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     *  $table->string('titulo');
         *   $table->string('descripcion');
          *  $table->datetime('fecha_inicio');
           
          *$table->datetime('fecha_fin');
           * $table->unsignedBigInteger('contacto_id');
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>fake()->word(),
            'descripcion'=>fake()->text(),
            'fecha_inicio'=>fake()->datetime(),
            'fecha_fin'=>fake()->datetime(),
            'contacto_id'=>fake()->numberbetween(1,150)
        ];
    }
}
