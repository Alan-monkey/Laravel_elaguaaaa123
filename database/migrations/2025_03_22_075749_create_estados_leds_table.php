<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('estados_leds', function (Blueprint $table) {
            $table->id();
            $table->integer('led'); // Número del LED
            $table->boolean('estado'); // Estado del LED (encendido/apagado)
            $table->timestamp('fecha')->useCurrent(); // Fecha del cambio
        });
    }

    public function down() {
        Schema::dropIfExists('estados_leds');
    }
};
