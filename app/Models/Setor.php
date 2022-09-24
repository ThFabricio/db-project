<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    // Associacoes

    public function granja(){
        return $this->belongsTo(Granja::class);
    }

    public function historico(){
        return $this->hasMany(Historico::class);
    }
}
