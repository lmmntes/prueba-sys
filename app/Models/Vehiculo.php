<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'placa', 'color', 'año', 'fecha_ingreso', 'modelo', 'marca'
    ];
}
