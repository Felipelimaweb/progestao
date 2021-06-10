<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sede',
        'nome',
        'cnpj',
    
    ];
    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }
    
}
