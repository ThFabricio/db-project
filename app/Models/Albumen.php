<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'peso',
        'id_ovo',
        'altura',
        'diametro',
        'unidade_haugh',
        'ph'
    ];

    // Associacoes

    public function ovo(){
        return $this->belongsTo(Ovo::class);
    }
}
