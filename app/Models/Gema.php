<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gema extends Model
{
    use HasFactory;


    protected $fillable = [

        'id_ovo',
        'peso',
        'altura',
        'diametro',
        'indice',
        'cor',
        'ph'
    ];


    // Associacoes

    public function ovo(){
        return $this->belongsTo(Ovo::class);
    }
}
