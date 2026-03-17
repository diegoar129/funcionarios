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
         Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->string('nivel');
            $table->string('titulo');
            $table->string('institucion');
            $table->date('fecha_graduacion');
            $table->timestamps();
        });

    }

    public function down(): void
    {
     Schema::dropIfExists('estudio');
    }
};
