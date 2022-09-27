<?php

namespace App\Http\Controllers;

use App\Models\Albumen;
use App\Models\Casca;
use App\Models\Gema;
use App\Models\Historico;
use App\Models\Ovo;
use App\Models\Setor;
use Illuminate\Http\Request;

class OvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ovos = Ovo::all();
        return view('ovos.listar', ['ovos' => $ovos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $setores = Setor::all();
        return view('ovos.criar', ['setores' => $setores]);
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
            'peso'=>[],
            'idade_das_aves' => [],
            'id_setor' => [],
            //albumen
            'pesoAlbumen'=>[],
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

        $historico = Historico::where('idade_das_aves', $request->idade_das_aves)
            ->where('id_setor', $request->id_setor)->fisrt();

        if (is_null($historico)) {
            $historico = new Historico();
        }

        $historico->idade_das_aves = $request->idade_das_aves;
        $historico->id_setor = $request->id_setor;

        $ovo->peso = $request->peso;
        $ovo->id_historico = $historico->id;

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
        $ovo = Ovo::find($id);
        $historico = Historico::find($ovo->id_historico);
        $setores = Setor::all();
        $albumen = Albumen::where('id_ovo', $ovo->id)->first();
        $casca = Casca::where('id_ovo', $ovo->id)->first();
        $gema = Gema::where('id_ovo', $ovo->id)->first();
        return view('ovos.mostrar', ['ovo'=>$ovo, 'setores'=>$setores, 'historico'=>$historico, 'albumen'=>$albumen, 'casca'=>$casca, 'gema'=>$gema]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ovo = Ovo::find($id);
        $historico = Historico::find($ovo->id_historico);
        $setores = Setor::all();
        $albumen = Albumen::where('id_ovo', $ovo->id)->first();
        $casca = Casca::where('id_ovo', $ovo->id)->first();
        $gema = Gema::where('id_ovo', $ovo->id)->first();
        return view('ovos.editar', ['ovo'=>$ovo, 'setores'=>$setores, 'historico'=>$historico, 'albumen'=>$albumen, 'casca'=>$casca, 'gema'=>$gema]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $ovo = Ovo::find($id);
        $albumen = Albumen::where('id_ovo', $ovo->id)->first();
        $casca = Casca::where('id_ovo', $ovo->id)->first();
        $gema = Gema::where('id_ovo', $ovo->id)->first();

        $request->validate([
            //ovo
            'peso'=>[],
            'idade_das_aves' => [],
            'id_setor' => [],
            //albumen
            'pesoAlbumen'=>[],
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

        $historico = Historico::where('idade_das_aves', $request->idade_das_aves)
            ->where('id_setor', $request->id_setor)->fisrt();

        if (is_null($historico)) {
            $historico = new Historico();
        }

        $historico->idade_das_aves = $request->idade_das_aves;
        $historico->id_setor = $request->id_setor;

        $ovo->peso = $request->peso;
        $ovo->id_historico = $historico->id;

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

        return view ('listar.ovo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $ovo = Ovo::find($id);
        $ovo->delete();

        return redirect('listar.ovo');
    }
}
