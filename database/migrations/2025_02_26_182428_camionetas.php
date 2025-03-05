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
            $table->string('id_garrafon');
            $table->string('id_repartidor');
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
