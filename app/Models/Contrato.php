<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'data',
        'tipo',
        'objeto',
        'ciclo',
        'valor',
        'idcontrato',

    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
