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
        Schema::create('student_recognitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_award');
            $table->date('date_awarded')->nullable();
            $table->string('institution');
            $table->string('grantee_name');
            $table->string('medal_type');
            $table->string('program_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_recognitions');
    }
};
