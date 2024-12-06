<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'avatar' => $this->faker->imageUrl(100, 100, 'people'), 
            'fecha_nacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['masculino', 'femenino', 'otro']),
            'telefono' => $this->faker->phoneNumber(),
            'correo_electronico' => $this->faker->unique()->userName() . '@gmail.com',
            'direccion' => $this->faker->address(),
            'contacto_emergencia' => $this->faker->phoneNumber(),
        ];
    }
}
