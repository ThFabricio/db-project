<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeCriacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'id_granja',
    ];

    // Associacoes

    public function granja(){
        return $this->hasMany(Granja::class);
    }
}
