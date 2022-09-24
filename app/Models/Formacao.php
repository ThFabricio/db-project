<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'id_pesquisador',
    ];

    // Associacoes

    public function pesquisador(){
        return $this->belongsTo(Pesquisador::class);
    }
}
