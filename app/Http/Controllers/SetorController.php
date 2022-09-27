<?php

namespace App\Http\Controllers;

use App\Models\Granja;
use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setores = Setor::all();
        return view('setores.listar', ['setores' => $setores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $granjas = Granja::all();
        return view('setores.criar', ['granjas' => $granjas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'numero' => 'required',
            'linhagem' => 'required',
            'quantidade_de_aves' => 'required',
            'nutricao' => 'required',
            'id_granja' => 'required',
        ]);

        $setor = Setor::create([
            'numero' => $request->numero,
            'linhagem' => $request->linhagem,
            'quantidade_de_aves' => $request->quantidade_de_aves,
            'nutricao' => $request->nutricao,
            'id_granja' => $request->id_granja,
        ]);

        $setor->save();
        return redirect()->route('listar.setor')->with('success', 'Setor salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setor = Setor::find($id);
        return view('setores.mostrar', ['setor' => $setor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setor = Setor::find($id);
        $granjas = Granja::all();
        return view('setores.editar', ['setor' => $setor, 'granjas' => $granjas]);
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
        $request->validate([
            'numero' => 'required',
            'linhagem' => 'required',
            'quantidade_de_aves' => 'required',
            'nutricao' => 'required',
            'id_granja' => 'required',
        ]);

        $setor = Setor::find($id);
        $setor->numero = $request->get('numero');
        $setor->linhagem = $request->get('linhagem');
        $setor->quantidade_de_aves = $request->get('quantidade_de_aves');
        $setor->nutricao = $request->get('nutricao');
        $setor->id_granja = $request->get('id_granja');
        $setor->save();

        return redirect()->route('listar.setor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setor = Setor::find($id);
        $setor->delete();

        return redirect('listar.setores')->with('success', 'Setor deletado com sucesso!');
    }
}
