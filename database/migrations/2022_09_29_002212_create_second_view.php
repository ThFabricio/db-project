<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    private function createView(): string
    {
        return "
            CREATE VIEW view_setor_data(numero_setor, qtd_ovos, media_peso_ovos, media_idade_das_aves) AS
                SELECT 
                    s.numero, 
                    COUNT(o.id), 
                    AVG(o.peso),
                    AVG(h.idade_das_aves)
                FROM setors as s LEFT OUTER JOIN historicos as h
                ON s.id = h.id_setor
                LEFT OUTER JOIN ovos as o
                ON o.id_historico = h.id
                GROUP BY s.numero;
        ";
    }

    private function dropView(): string
    {
        return "
            DROP VIEW IF EXISTS `view_setor_data`;
        ";
    }
};
