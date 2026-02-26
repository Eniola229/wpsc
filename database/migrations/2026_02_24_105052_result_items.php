<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('result_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            // Foreign Key must be UUID
            $table->uuid('student_result_id');
            $table->foreign('student_result_id')->references('id')->on('student_results')->onDelete('cascade');

            $table->string('course_name');
            $table->string('course_code')->nullable();          // NEW: e.g. 011, 012
            $table->decimal('score', 5, 2);
            $table->string('grade');
            $table->string('remark');
            $table->string('position_in_course')->nullable();   // NEW: e.g. 1ST, 2ND

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('result_items');
    }
};