<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumivel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sede',
        'nome',
        'data',
        'valor',
        'notafiscal',
    
    ];
}
