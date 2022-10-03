<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    public function mostrarConsultas()
    {
        return view('consultas.mostrar-consultas', ['consulta' => 0]);
    }

    public function realizarConsultas(Request $request)
    {
        $consulta = $request['consulta'];
        switch ($consulta) {
            case 1:
                return $this->consulta1($request['input1']);
            case 2:
                return $this->consulta2($request['input1']);
            case 3:
                return $this->consulta3($request['input1']);
            case 4:
                return $this->consulta4($request['input1']);
            case 5:
                return $this->consulta5();
            case 6:
                return $this->consulta6($request['input1']);
            case 7:
                return $this->consulta7($request['input1'], $request['input2']);
            case 8:
                return $this->consulta8();
            case 9:
                return $this->consulta9();
            case 10:
                return $this->consulta10($request['input1']);
        }
    }

    private function consulta1($input1) 
    {
        $results = DB::select(
            DB::raw("
                SELECT u.nome, u.cpf 
                FROM users AS u INNER JOIN proprietarios AS p
                ON u.id = p.id_usuario 
                WHERE p.id IN (
                    SELECT id_proprietario 
                    FROM granjas 
                    WHERE cnpj = '$input1'
                );
            ") 
        );

        return view('consultas.mostrar-consultas', ['consulta' => 1, 'dados' => $results]);
    }

    private function consulta2($input1) 
    {
        $results = DB::select(
            DB::raw("
                SELECT email_comercial 
                FROM proprietarios 
                WHERE id IN (
                    SELECT id_proprietario FROM granjas WHERE id IN (
                        SELECT id_granja FROM funcionarios WHERE id_usuario IN (
                            SELECT id FROM users WHERE cpf = '$input1'
                        )
                    )
                )
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 2, 'dados' => $results]);
    }

    private function consulta3($input1) 
    {
        $results = DB::select(
            DB::raw("
                SELECT COUNT(*) AS qtd_granja
                FROM granjas 
                WHERE id_proprietario in (
                    SELECT p.id 
                    FROM users AS u INNER JOIN proprietarios AS p
                    ON u.id = p.id_usuario 
                    WHERE u.nome = '$input1'
                )
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 3, 'dados' => $results]);
    }

    private function consulta4($input1) 
    {
        $results = DB::select(
            DB::raw("
                SELECT DISTINCT salario FROM funcionarios WHERE id_granja IN (
                    SELECT id FROM granjas WHERE cnpj = '$input1'
                )
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 4, 'dados' => $results]);
    }

    private function consulta5() 
    {
        $results = DB::select(
            DB::raw("
                SELECT granjas.cnpj AS cnpj, COUNT(funcionarios.id) AS qtd_func, AVG(funcionarios.salario) AS media_salario
                FROM granjas LEFT OUTER JOIN funcionarios
                ON granjas.id = funcionarios.id_granja
                GROUP BY granjas.cnpj
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 5, 'dados' => $results]);
    }

    private function consulta6() 
    {
        $results = DB::select(
            DB::raw("
                SELECT usuario.cpf, usuario.nome 
                FROM pesquisadors pesquisador, users usuario 
                WHERE pesquisador.id_pesquisador_supervisor IS null AND pesquisador.id_usuario = usuario.id;
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 6, 'dados' => $results]);
    }

    private function consulta7($input1, $input2)
    {
        $results = DB::select(
            DB::raw("
                SELECT COUNT(*) AS qtd
                FROM ovos
                WHERE peso > '$input1' AND id_historico IN ( 
                    SELECT id 
                    FROM historicos 
                    WHERE id_setor IN ( 
                        SELECT id_granja 
                        FROM setors 
                        WHERE id_granja IN ( 
                            SELECT id_granja 
                            FROM pesquisador_granjas 
                            WHERE id_pesquisador IN ( 
                                SELECT id 
                                FROM pesquisadors
                                WHERE id_usuario IN (
                                    SELECT id
                                    FROM users
                                    WHERE (nome = '$input2')
                                )
                            )
                        )
                    )
                );            
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 7, 'dados' => $results]);
    }

    private function consulta8()
    {
        $results = DB::select(
            DB::raw("
                SELECT usuario.cpf, granja.nome, setor.numero 
                FROM users usuario, proprietarios proprietario, granjas granja, setors setor 
                WHERE (granja.id_proprietario = proprietario.id) AND (setor.id_granja = granja.id) and (usuario.id = proprietario.id_usuario) 
                ORDER BY usuario.cpf;
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 8, 'dados' => $results]);
    }

    private function consulta9()
    {
        $results = DB::select(
            DB::raw("
                SELECT COUNT(DISTINCT universidade) AS qtd FROM pesquisadors;
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 9, 'dados' => $results]);
    }

    private function consulta10($input1)
    {
        $results = DB::select(
            DB::raw("
                SELECT COUNT(salario BETWEEN 1000 AND 5000) AS qtd
                FROM funcionarios INNER JOIN granjas
                ON funcionarios.id_granja = granjas.id
                WHERE (granjas.cnpj = '$input1')
            ")
        );

        return view('consultas.mostrar-consultas', ['consulta' => 10, 'dados' => $results]);
    }
}
