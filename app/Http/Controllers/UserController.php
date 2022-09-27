<?php

namespace App\Http\Controllers;

use App\Models\Formacao;
use App\Models\Funcionario;
use App\Models\Granja;
use App\Models\Pesquisador;
use App\Models\PesquisadorGranja;
use App\Models\Proprietario;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.listar', ['usuarios' => User::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuarios.mostrar', ['usuario' => User::find($id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('usuarios.criar', [
            'granjas' => Granja::all(),
            'pesquisadores' => Pesquisador::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'min:11', 'max:11', 'unique:users'],
            'perfil' => ['required', 'string', Rule::in(['Proprietário', 'Funcionário', 'Pesquisador'])],
            'password' => ['required']
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password),
        ]);

        if ($request->perfil == 'Proprietário') {
            $request->validate([
                'email_comercial' => ['required', 'string', 'email', 'max:255', 'unique:proprietarios'],
                'codigo_licenca' => ['required', 'string', 'unique:proprietarios']
            ]);
            Proprietario::create([
                'email_comercial' => $request->email_comercial,
                'codigo_licenca' => $request->codigo_licenca,
                'id_usuario' => $user->id
            ]);
        } else if ($request->perfil == 'Funcionário') {
            $request->validate([
                'regime_contratacao' => ['required', 'string', 'max:255'],
                'salario' => ['required', 'numeric']
            ]);
            try {
                Funcionario::create([
                    'regime_contratacao' => $request->regime_contratacao,
                    'salario' => $request->salario,
                    'id_granja' => Granja::findOrFail($request->id_granja_funcionario)->id,
                    'id_usuario' => $user->id
                ]);
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Granja não existe!');
            }
        } else if ($request->perfil == 'Pesquisador') {
            $request->validate([
                'universidade' => ['required', 'string', 'max:255'],
                'formacoes' => ['required', 'string']
            ]);
            try {
                $supervisor = Pesquisador::find($request->id_pesquisador_supervisor);
                $pesquisador = Pesquisador::create([
                    'universidade' => $request->universidade,
                    'id_pesquisador_supervisor' => ($supervisor == null) ? null : $supervisor->id,
                    'id_usuario' => $user->id
                ]);
                PesquisadorGranja::create([
                    'id_granja' => Granja::findOrFail($request->id_granja_pesquisador)->id,
                    'id_pesquisador' => $pesquisador->id
                ]);
                foreach (explode(';', $request->formacoes) as $formacao) {
                    if (trim($formacao) != '') {
                        Formacao::create([
                            'tipo' => trim($formacao),
                            'id_pesquisador' => $pesquisador->id
                        ]);
                    }
                }
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Pesquisador supervisor ou Granja não existe!');
            }
        } else {
            return null;
        }

        return redirect()->route('listar.usuario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('usuarios.editar');
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
        $user = User::find($id);
        if ($user->proprietario) {
            $user->proprietario->delete();
            $user->delete();
        } else if ($user->funcionario) {
            $user->funcionario->delete();
            $user->delete();
        } else if ($user->pesquisador) {
            foreach ($user->pesquisador->supervisados as $supervisados) {
                $supervisados->id_pesquisador_supervisor = null;
                $supervisados->save();
            }
            $user->pesquisador->delete();
            $user->delete();
        }
    }
}
