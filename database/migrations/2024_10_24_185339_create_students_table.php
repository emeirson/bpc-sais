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
            $table->id();
            $table->string('student_code')->unique();
            // Personal Information
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('barangay');
            $table->string('town');
            $table->string('province');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('religion')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('citizenship');
            $table->string('mobile_number');
            $table->string('email')->unique();

            // Family Information
            $table->string('father_lastname');
            $table->string('father_firstname');
            $table->string('father_middlename')->nullable();
            $table->string('father_education')->nullable();
            $table->string('father_address')->nullable();
            $table->string('father_mobile_number')->nullable();
            $table->string('mother_lastname');
            $table->string('mother_firstname');
            $table->string('mother_middlename')->nullable();
            $table->string('mother_education')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('mother_mobile_number')->nullable();
            $table->boolean('beneficiary_4ps')->default(false);

            // Academic Information
            $table->string('school_name');
            $table->string('school_address');
            $table->string('honors_received')->nullable();
            $table->year('year_graduated');
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
