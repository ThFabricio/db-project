<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Granja extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_proprietario',
        'nome',
        'cnpj'
    ];

    // Associacoes


    public function proprietario(){
        return $this->belongsTo(Proprietario::class);
    }

    public function funcionario(){
        return $this->hasMany(Funcionario::class);
    }

    public function setor(){
        return $this->hasMany(Setor::class);
    }

    public function pesquisadorGranja(){
        return $this->hasMany(PesquisadorGranja::class);
    }

    public function localizacao(){
        return $this->hasMany(Localizacao::class);
    }

    public function tipoCriacaoe(){
        return $this->hasMany(TipoCriacaoe::class);
    }


}
