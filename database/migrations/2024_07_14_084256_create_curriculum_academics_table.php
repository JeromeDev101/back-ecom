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
        Schema::create('curriculum_academics', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id');
            $table->boolean('is_copc')->default(0);
            $table->string('copc_number');
            $table->date('date_held');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_academics');
    }
};
