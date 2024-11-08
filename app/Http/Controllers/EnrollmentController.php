<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentProgramLevel;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('enrollment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        $studentRecord = StudentProgramLevel::where('student_id', $student->id)->whereNull('grade')->first();
        $program = $studentRecord->program;
        // $level = $studentRecord->yearLevel;
        return view('enrollment.create', [
            'student' => $student,
            'sections' => Section::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        dd($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
