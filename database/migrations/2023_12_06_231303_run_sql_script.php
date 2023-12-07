<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RunSqlScript extends Migration
{
    public function up()
    {
        $sqlPath = base_path('database/migrations/db_dmp.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }

    public function down()
    {
        // В случае отката миграции
    }
}
