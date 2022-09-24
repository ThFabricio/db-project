<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gema extends Model
{
    use HasFactory;


    // Associacoes

    public function ovo(){
        return $this->belongsTo(Ovo::class);
    }
}
