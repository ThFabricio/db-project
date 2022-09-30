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
            CREATE VIEW view_granja_data(nome_granja, qtd_setores, qtd_funcionarios) AS
                SELECT 
                    g.nome, 
                    COUNT(s.id), 
                    COUNT(f.id)
                FROM granjas as g LEFT OUTER JOIN setors as s
                ON g.id = s.id_granja
                LEFT OUTER JOIN funcionarios as f
                ON g.id = f.id_granja
                GROUP BY g.nome;
        ";
    }

    private function dropView(): string
    {
        return "
            DROP VIEW IF EXISTS `view_granja_data`;
        ";
    }
};
