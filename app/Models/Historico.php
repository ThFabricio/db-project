<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_setor',
        'idade_das_aves'

    ];


    // Associacoes

    public function setor(){
        return $this->belongsTo(Setor::class, 'id_setor');
    }

    public function ovo(){
        return $this->hasMany(Ovo::class, 'id_ovo');
    }
}
