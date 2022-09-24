<?php

namespace App\Http\Controllers;

use App\Models\Albumen;
use App\Models\Casca;
use App\Models\Gema;
use App\Models\Ovo;
use Illuminate\Http\Request;

class OvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ovos.listar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ovos.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $ovo = new Ovo();
        $albumen = new Albumen();
        $casca = new Casca();
        $gema = new Gema();

        $request->validate([
            //ovo
            'peso'=>['required','double'],
            'id_historico'=>['required','int'],
            //albumen
            'pesoAlbumen'=>['required', 'double'],
            'alturaAlbumen'=>[],
            'diametroAlbumen'=>[],
            'unidade_haugh'=>[],
            'phAlbumen'=>[],
            //casca
            'pesoCasca'=>[],
            'corCasca'=>[],
            'espessura1'=>[],
            'espessura2'=>[],
            'espessura3'=>[],
            //gema
            'pesoGema'=>[],
            'alturaGema'=>[],
            'diametroGema'=>[],
            'indiceGema'=>[],
            'phGema'=>[],
            'corGema'=>[],
        ]);

        $ovo->peso = $request->peso;
        $ovo->id_historico = $request->id_historico;

        $ovo->save();

        //albumen

        $albumen->id_ovo = $ovo->id;
        $albumen->peso = $request->pesoAlbumen;
        $albumen->altura = $request->alturaAlbumen;
        $albumen->diametro = $request->diametroAlbumen;
        $albumen->unidade_haugh = $request->unidade_haugh;
        $albumen->ph = $request->phAlbumen;

        $albumen->save();

        //casca

        $casca->id_ovo = $ovo->id;
        $casca->peso = $request->pesoCasca;
        $casca->cor = $request->corCasca;
        $casca->espessura1 = $request->espessura1;
        $casca->espessura2 = $request->espessura2;
        $casca->espessura3 = $request->espessura3;

        $casca->save();

        //gema

        $gema->id_ovo = $ovo->id;
        $gema->peso = $request->pesoGema;
        $gema->altura = $request->alturaGema;
        $gema->diametro = $request->diametroGema;
        $gema->indice = $request->indiceGema;
        $gema->ph = $request->phGema;
        $gema->cor = $request->corGema;

        $gema->save();

        return view ('form.criar.ovo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('ovos.mostrar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('ovos.editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
