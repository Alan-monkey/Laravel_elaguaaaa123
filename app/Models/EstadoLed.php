<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoLed extends Model {
    use HasFactory;

    protected $table = 'estados_leds';
    protected $fillable = ['led', 'estado', 'fecha'];
    public $timestamps = false;
}
