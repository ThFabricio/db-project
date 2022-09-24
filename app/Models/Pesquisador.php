<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisador extends Model
{
    use HasFactory;

    // Associacoes

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pesquisadorGranja(){
        return $this->hasOne(PesquisadorGranja::class);
    }

    public function formacoes(){
        return $this->hasMany(Formacao::class);
    }
}
