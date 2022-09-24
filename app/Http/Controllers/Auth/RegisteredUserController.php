<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Granja;
use App\Models\Pesquisador;
use App\Models\PesquisadorGranja;
use App\Models\Proprietario;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register', [
            'granjas' => Granja::all(),
            'pesquisadores' => Pesquisador::all()
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'min:11', 'max:11', 'unique:users'],
            'perfil' => ['required', 'string', Rule::in(['Proprietário', 'Funcionário', 'Pesquisador'])],
            'senha' => ['required']
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'senha' => Hash::make($request->senha),
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
                'salario' => ['required', 'number']
            ]);
            try {
                Funcionario::create([
                    'regime_contratacao' => $request->regime_contratacao,
                    'salario' => $request->salario,
                    'id_granja' => Granja::findOrFail($request->id_granja_funcionario),
                    'id_usuario' => $user->id
                ]);
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Granja não existe!');
            }
        } else if ($request->perfil == 'Pesquisador') {
            $request->validate([
                'universidade' => ['required', 'string', 'max:255'],
                'salario' => ['required', 'number']
            ]);
            try {
                $pesquisador = Pesquisador::create([
                    'universidade' => $request->universidade,
                    'id_pesquisador_supervisor' => Pesquisador::findOrFail($request->id_pesquisador_supervisor),
                    'id_usuario' => $user->id
                ]);
                PesquisadorGranja::create([
                    'id_granja' => Granja::findOrFail($request->id_granja_pesquisador),
                    'id_pesquisador' => $pesquisador->id
                ]);
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Pesquisador supervisor ou Granja não existe!');
            }
        } else {
            return null;
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
