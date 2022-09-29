<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaoBDController extends Controller
{
    public function mostrarVisoes() {
        return view('visoes.mostrar-visoes');
    }
}
