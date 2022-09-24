<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'linhagem',
        'quantidade_de_aves',
        'nutricao',
        'id_granja',
    ];

    // Associacoes

    public function granja(){
        return $this->belongsTo(Granja::class);
    }

    public function historico(){
        return $this->hasMany(Historico::class);
    }
}
