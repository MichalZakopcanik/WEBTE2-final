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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->text('solution_html');
            $table->string("file_name");
            $table->longText('image');
            $table->longText('equation_html');
            $table->float('points')->default(0);
            $table->enum('status',['finished','open'])->default('open');
            $table->unsignedBigInteger("result_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
