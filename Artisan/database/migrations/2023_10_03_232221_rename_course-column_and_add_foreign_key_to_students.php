<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->renamecolumn('course','course_id');
            $table->unsignedbiginteger('course_id')->change();
            $table->foreign('course_id')->refernces('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
        $table->renamecolumn('course_id','course');
        $table->dropforeign(['course']);
        $table->dropcolumn('course_id'),
        });
    }
};
