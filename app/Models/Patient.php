<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, Searchable; 

    // Campos rellenables en el modelo
    protected $fillable = [
        'name',
        'apellido',
        'direccion',
        'telefono',
        'correo_electronico',
        'genero',
        'contacto_emergencia',
        'fecha_nacimiento',
        'avatar',
    ];
}
