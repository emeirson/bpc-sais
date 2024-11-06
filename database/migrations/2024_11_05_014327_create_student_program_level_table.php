<?php

use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\Student;
use App\Models\YearLevel;
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
        Schema::create('student_program_level', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(YearLevel::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(AcademicYear::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Program::class)->constrained()->cascadeOnDelete();
            $table->integer('grade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_program_level');
    }
};
