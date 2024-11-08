<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use App\Models\YearLevel;
use Illuminate\Support\Arr;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\StudentProgramLevel;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create', [
            'levels' => YearLevel::all(),
            'programs' => Program::all(),
            'academic_year' => AcademicYear::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['student_code'] = Student::generateStudentId();

        $student = Student::create(Arr::except($validatedData, ['year_level_id', 'academic_year_id', 'program_id']));
        StudentProgramLevel::create(Arr::only($validatedData, ['year_level_id', 'academic_year_id', 'program_id']) + ['student_id' => $student->id]);

        return redirect()->route('students.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->validated();
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Record removed successfully.');
    }
}
