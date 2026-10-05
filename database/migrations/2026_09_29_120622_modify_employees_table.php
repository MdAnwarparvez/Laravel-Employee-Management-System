<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE employees
            CHANGE id employee_id BIGINT UNSIGNED NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE employees
            CHANGE employee_id id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT
        ");
    }
};