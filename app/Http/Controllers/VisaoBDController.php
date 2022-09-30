<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisaoBDController extends Controller
{
    public function mostrarVisoes() {
        return view('visoes.mostrar-visoes', ['tipo_visao' => 0]);
    }

    public function carregarVisaoGranja() {
        $results = DB::select(
            DB::raw("
                SELECT * FROM view_granja_data;
            ") 
        );

        return view('visoes.mostrar-visoes', ['tipo_visao' => 1, 'dados' => $results]);
    }

    public function carregarVisaoSetor() {
        $results = DB::select(
            DB::raw("
                SELECT * FROM view_setor_data;
            ") 
        );

        return view('visoes.mostrar-visoes', ['tipo_visao' => 2, 'dados' => $results]);
    }
}
