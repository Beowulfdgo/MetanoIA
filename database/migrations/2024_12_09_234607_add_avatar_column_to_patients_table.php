<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Solo agregamos la columna si no existe
        if (!Schema::hasColumn('patients', 'avatar')) {
            Schema::table('patients', function (Blueprint $table) {
                $table->string('avatar')->nullable(); // Ajusta el tipo si es necesario
            });
        }
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
};

