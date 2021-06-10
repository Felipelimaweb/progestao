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
        'datainicial',
        'datafinal',
        'tipo',
        'objeto',
        'ciclo',
        'valor',

    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function prestador()
    {
        return $this->belongsTo(Prestador::class);
    }

    public function notafiscal()
    {
        return $this->hasMany(Notafiscal::class);
    }

}
