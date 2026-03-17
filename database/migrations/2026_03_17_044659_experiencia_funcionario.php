<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
         Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->string('empresa');
            $table->string('cargo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('funcionario_id')
                  ->references('id')
                  ->on('funcionarios')
                  ->onDelete('cascade');
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('experiencias');
    }
};
