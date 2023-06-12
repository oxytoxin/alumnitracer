<?php

use App\Models\User;
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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('current_designation')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('full_name')->nullable()->virtualAs("CONCAT_WS(' ', first_name, IFNULL(CONCAT(LEFT(middle_name, 1), '.'), ''), last_name, COALESCE(suffix, ''))");
            $table->string('alt_full_name')->nullable()->virtualAs("CONCAT_WS(', ', last_name, CONCAT_WS(' ', first_name, COALESCE(middle_name, ''), COALESCE(suffix, '')))");
            $table->string('post_nominal_designations')->nullable();
            $table->text('address');
            $table->text('bio')->nullable();
            $table->year('year_graduated');
            $table->string('id_number');
            $table->string('contact_number')->nullable();
            $table->jsonb('skills');
            $table->jsonb('hobbies');
            $table->json('references');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
