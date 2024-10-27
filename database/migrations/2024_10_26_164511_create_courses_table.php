<?php

use App\Models\Course;
use App\Models\Program;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('description');
            $table->integer('units');
            $table->unsignedInteger('lecture_hours');
            $table->unsignedBigInteger('laboratory_hours');
            $table->foreignIdFor(Course::class, 'prerequisite_course_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('course_program', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Program::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('year_level');
            $table->string('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_program');
        Schema::dropIfExists('courses');
    }
};
