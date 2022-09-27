<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ovo extends Model
{
    use HasFactory;


    protected $fillable = [
        'peso',
        'id_historico',
    ];

    // Associacoes

    public function albumen(){
        return $this->hasOne(Albumen::class, 'id_ovo');
    }

    public function gema(){
        return $this->hasOne(Gema::class, 'id_ovo');
    }

    public function casca(){
        return $this->hasOne(Casca::class, 'id_ovo');
    }

    public function historico(){
        return $this->belongsTo(Historico::class, 'id_historico');
    }
}
