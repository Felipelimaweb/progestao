<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notafiscal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'valor',
        'data',
        'confirmação',
    
    ];
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
