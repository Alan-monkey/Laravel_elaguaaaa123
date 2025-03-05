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
        Schema::create('tb_ventas', function (Blueprint $table) {
            $table->id('id_ventas');
            $table->string('tipo');
            $table->string('descripcion');
            $table->string('garrafones_vendidos');
            $table->string('venta_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ventas');
    }
};
