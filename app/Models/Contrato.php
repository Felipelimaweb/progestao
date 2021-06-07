<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cliente_id',
        'prestador_id',
        'fornecedor_id',
        'funcionario_id',
        'nome',
        'data',
        'tipo',
        'objeto',
        'ciclo',
        'valor',

    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public $rules = [
        'nome' => 'required|min:3|max:100',
        'data' => 'required|min:3|max:100',
    ];

}
