<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    // Associacoes

    public function granja(){
        return $this->belongsTo(Granja::class);
    }
}
