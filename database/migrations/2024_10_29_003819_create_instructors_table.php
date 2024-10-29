<?php

use App\Models\Department;
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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_code')->unique();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('salutation');
            $table->string('sex');
            $table->date('birthdate');
            $table->string('barangay');
            $table->string('town');
            $table->string('province');
            $table->string('image')->nullable();
            $table->string('professional_no')->unique();
            $table->string('appointment_nature');
            $table->string('employment_status');
            $table->date('date_hired');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
