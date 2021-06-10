<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sede',
        'nome',
        'cpf',
        'email',
        'telefone',
        'cargo',
        'salario',
    
    ];
    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }
}
