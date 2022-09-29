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
            CREATE VIEW view_user_data AS
                SELECT 
                    users.id, 
                    users.name, 
                    users.email,
                    (SELECT count(*) FROM posts
                                WHERE posts.user_id = users.id
                            ) AS total_posts,
                    (SELECT count(*) FROM comments
                                WHERE comments.user_id = users.id
                            ) AS total_comments
                FROM users
            SQL;
        ";
    }

    private function dropView(): string
    {
        return "
            DROP VIEW IF EXISTS `view_user_data`;
            SQL;
        ";
    }
};
