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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('passport');
            $table->string('passport_id');
            $table->string('name');
            $table->date('dob');
            $table->string('sex');
            $table->string('state_of_origin');
            $table->string('place_of_birth');
            $table->string('age');
            $table->string('relationship');
            $table->string('address');
            $table->string('nationality');
            $table->string('type_of_baptism');
            $table->string('holy_ghost_baptism')->nullable();
            $table->string('father_name');
            $table->string('father_address');
            $table->string('father_mobile');
            $table->string('mother_name');
            $table->string('mother_address');
            $table->string('mother_mobile');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_address')->nullable();
            $table->string('spouse_mobile')->nullable();
            $table->string('church_name');
            $table->string('church_location');
            $table->string('pastor_name');
            $table->string('pastor_mobile')->nullable();
            $table->string('commissioned');
            $table->string('denomination');
            $table->string('email')->unique();
            $table->string('password'); // Store as a hashed value
            $table->string('matric_no')->unique();
            $table->enum('is_admitted', ['YES', 'NO'])->default('NO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
