<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('apellido'); 
            $table->string('avatar'); 
            $table->date('fecha_nacimiento'); 
            $table->enum('genero', ['masculino', 'femenino', 'otro']); 
            $table->string('telefono');
            $table->string('correo_electronico'); 
            $table->string('direccion'); 
            $table->string('contacto_emergencia'); 
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

