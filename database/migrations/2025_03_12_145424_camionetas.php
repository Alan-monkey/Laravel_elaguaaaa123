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
        Schema::create('tb_camionetas', function (Blueprint $table) {
            $table->id('id_camioneta');
            $table->string('placas');
            $table->string('marca');
            $table->string('modelo');
            $table->string('capacidad');
            $table->unsignedBigInteger('id_repartidor'); // Columna para almacenar la relación
            $table->foreign('id_repartidor')->references('id_repartidor')->on('tb_repartidores')->onDelete('cascade'); // Definición de la clave foránea
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_camionetas');
    }
};
