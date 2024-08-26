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
        Schema::create('student_foreigns', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id');
            $table->string('num_student');
            $table->string('sy1');
            $table->string('sy2');
            $table->string('semester');
            $table->integer('country_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_foreigns');
    }
};
