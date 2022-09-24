<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    // Associacoes

    public function setor(){
        return $this->belongsTo(Setor::class);
    }

    public function ovo(){
        return $this->hasMany(Ovo::class);
    }
}
