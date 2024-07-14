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
        Schema::create('curriculum_performances', function (Blueprint $table) {
            $table->id();
            $table->string('exam_type');
            $table->string('cvsu_passing');
            $table->string('natl_passing');
            $table->date('date_held_from');
            $table->date('date_held_to');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_performances');
    }
};
