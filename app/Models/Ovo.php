<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ovo extends Model
{
    use HasFactory;

    // Associacoes

    public function albumen(){
        return $this->hasOne(Albumen::class);
    }

    public function gema(){
        return $this->hasOne(Gema::class);
    }

    public function casca(){
        return $this->hasOne(Casca::class);
    }

    public function historico(){
        return $this->belongsTo(Historico::class);
    }
}
