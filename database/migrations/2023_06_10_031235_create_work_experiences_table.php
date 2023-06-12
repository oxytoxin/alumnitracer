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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('sort')->nullable();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('employer');
            $table->string('designation');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->jsonb('other_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
