<?php

use App\Models\PersonalInformation;
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
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('sort')->nullable();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->date('year_enrolled');
            $table->date('year_graduated');
            $table->tinyInteger('level')->default(1);
            $table->string('academic_program')->nullable();
            $table->string('institution');
            $table->jsonb('other_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};
