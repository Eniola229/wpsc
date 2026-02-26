<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_results', function (Blueprint $table) {
            // Primary Key as UUID
            $table->uuid('id')->primary();
            
            // Foreign Key must be UUID to match students table
            $table->uuid('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('session'); 
            $table->string('level');
            
            // Summary Fields
            $table->decimal('assignment_score', 5, 2)->nullable();
            $table->string('assignment_grade')->nullable();
            $table->decimal('test_score', 5, 2)->nullable();
            $table->string('test_grade')->nullable();
            
            $table->decimal('total_score', 5, 2);
            $table->string('total_grade');
            $table->string('total_remark');
            $table->date('certificate_date')->nullable();

            // NEW: Class info
            $table->integer('class_size')->nullable();           // "Number in Class" e.g. 13
            $table->string('class_position')->nullable();        // "Position in Class" e.g. 1ST
            $table->string('assignment_position')->nullable();   // Position in assignment e.g. 1ST
            $table->string('test_position')->nullable();         // Position in test e.g. 2ND
            $table->string('overall_position')->nullable();      // Overall position e.g. 1ST
            
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};