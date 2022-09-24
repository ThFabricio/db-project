<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casca extends Model
{
    use HasFactory;

    protected $fillable = [

        'peso',
        'id_ovo',
        'espessura1',
        'espessura2',
        'espessura3',
        'cor'
    ];

    // Associacoes

    public function ovo(){
        return $this->belongsTo(Ovo::class);
    }
}
