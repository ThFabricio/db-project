<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisador extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_usuario',
        'universidade',
        'id_pesquisador_supervisor'
    ];

    // Associacoes

    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function granjas(){
        return $this->belongsToMany(Granja::class, 'pesquisador_granjas', 'id_pesquisador', 'id_granja');
    }

    public function formacoes(){
        return $this->hasMany(Formacao::class, 'id_pesquisador');
    }

    public function supervisor(){
        return $this->belongsTo(Pesquisador::class, 'id_pesquisador_supervisor');
    }

    public function supervisados(){
        return $this->hasMany(Pesquisador::class, 'id');
    }
}
