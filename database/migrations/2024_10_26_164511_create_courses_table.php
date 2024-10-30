<?php

use App\Models\College;
use App\Models\Course;
use App\Models\Department;
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
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(College::class)->constrained()->cascadeOnDelete();
            $table->string('course_code');
            $table->string('description');
            $table->integer('units');
            $table->unsignedInteger('lecture_hours');
            $table->unsignedBigInteger('laboratory_hours');
            $table->foreignIdFor(Course::class, 'prerequisite_course_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
