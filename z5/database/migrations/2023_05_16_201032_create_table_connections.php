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
        Schema::table('solutions', function (Blueprint $table) {
            $table->foreign('result_id')->references('id')->on('results')->onUpdate("cascade")->onDelete("cascade");
        });
        Schema::table('results', function (Blueprint $table) {
            $table->foreign('assignment_id')->references('id')->on('assignments')->onUpdate("cascade")->onDelete("cascade");
            $table->foreign('user_id')->references('id')->on('users')->onUpdate("cascade")->onDelete("cascade");

        });
        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->dropForeign(['result_id']);        
        });
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['assignment_id']);    
            $table->dropForeign(['user_id']);        
    
        });
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign(['created_by']);        
        });
    }
};
