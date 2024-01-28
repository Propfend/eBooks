<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $nome = $this->faker->unique->word;
        return [
            'nome' => $nome,
            'slug' => Str::slug($nome),
            'autor' => Autor::pluck('nome')->random(),
            'lançamento' => $this->faker->date,
            'paginas' => $this->faker->numberBetween(100, 1200),
            'sinopse' => $this->faker->unique->text,
            'id_user' => User::pluck('id')->random(),
            'id_categoria'  => Categoria::pluck('id')->random(),
        ];
    }
}