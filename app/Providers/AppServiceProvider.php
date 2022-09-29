<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            $querySql = str_replace(['?'], ['\'%s\''], $query->sql);
            $queryRawSql = vsprintf($querySql, $query->bindings);
            Log::debug('[SQL EXEC]', [
                    "raw sql"  => $queryRawSql,
                    "time" => $query->time,
                ]
            );
        });
    }
}
