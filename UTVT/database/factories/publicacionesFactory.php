<?php

namespace Database\Factories;

use App\Models\publicaciones;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class publicacionesFactory extends Factory
{
    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Titulo' => $this->faker->sentence,
            'Contenido' => $this->faker->paragraph,
            'ContenidoText' => $this->faker->text,
            'Activo' => $this->faker->boolean,
            'id_usuario' => 1, // Supongamos que tienes 10 usuarios
            'id_carrera' => $this->faker->numberBetween(1, 4), // Supongamos que tienes 5 carreras
            'id_cuatrimestre' => $this->faker->numberBetween(1, 11), // Supongamos que tienes 4 cuatrimestres
            'tags' => $this->faker->words(3, true), // Genera una cadena de 3 palabras separadas por espacios
            'Publica' => $this->faker->boolean,
        ];
    }
}

