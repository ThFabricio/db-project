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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $ovo = new Ovo();
        $albumen = new Albumen();
        $casca = new Casca();
        $gema = new Gema();

        $request->validate([
            //ovo
            'peso'=>['required'],
            'idade_das_aves' => ['required'],
            'id_setor' => ['required'],
            //albumen
            'pesoAlbumen'=>['required'],
            'alturaAlbumen'=>['required'],
            'diametroAlbumen'=>['required'],
            'unidade_haugh'=>['required'],
            'phAlbumen'=>['required'],
            //casca
            'pesoCasca'=>['required'],
            'corCasca'=>['required'],
            'espessura1'=>['required'],
            'espessura2'=>['required'],
            'espessura3'=>['required'],
            //gema
            'pesoGema'=>['required'],
            'alturaGema'=>['required'],
            'diametroGema'=>['required'],
            'indiceGema'=>['required'],
            'phGema'=>['required'],
            'corGema'=>['required'],
        ]);

        $historico = Historico::where('idade_das_aves', $request->idade_das_aves)
            ->where('id_setor', $request->id_setor)->first();

        if (is_null($historico)) {
            $historico = Historico::create([
                'idade_das_aves' => $request->idade_das_aves,
                'id_setor' => $request->id_setor,
            ]);
        }

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

        return redirect()->route('listar.ovo');
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

        return view('ovos.mostrar', ['ovo'=>$ovo]);
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

        return view('ovos.editar', ['ovo'=>$ovo, 'setores' => Setor::all()]);
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
        $albumen = $ovo->albumen;
        $casca = $ovo->casca;
        $gema = $ovo->gema;

        $request->validate([
            //ovo
            'peso'=>['required'],
            'idade_das_aves' => ['required'],
            'id_setor' => ['required'],
            //albumen
            'pesoAlbumen'=>['required'],
            'alturaAlbumen'=>['required'],
            'diametroAlbumen'=>['required'],
            'unidade_haugh'=>['required'],
            'phAlbumen'=>['required'],
            //casca
            'pesoCasca'=>['required'],
            'corCasca'=>['required'],
            'espessura1'=>['required'],
            'espessura2'=>['required'],
            'espessura3'=>['required'],
            //gema
            'pesoGema'=>['required'],
            'alturaGema'=>['required'],
            'diametroGema'=>['required'],
            'indiceGema'=>['required'],
            'phGema'=>['required'],
            'corGema'=>['required'],
        ]);

        $historico = Historico::where('idade_das_aves', $request->idade_das_aves)
            ->where('id_setor', $request->id_setor)->first();

        if (is_null($historico)) {
            $historico = Historico::create([
                'idade_das_aves' => $request->idade_das_aves,
                'id_setor' => $request->id_setor,
            ]);
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

        return redirect()->route('listar.ovo');
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

        return redirect()->route('listar.ovo');
    }
}
