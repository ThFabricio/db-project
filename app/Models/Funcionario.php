<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_usuario',
        'id_granja',
        'salario',
        'regime_de_contrato'
    ];

    // Associacoes

    public function user(){
        return $this->belongsTo(User::class);
    }
}
