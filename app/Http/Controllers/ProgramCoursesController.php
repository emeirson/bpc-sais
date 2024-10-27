<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProgramCoursesRequest;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Program $program)
    {
        return view('program-courses.edit', [
            'program' => $program,
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramCoursesRequest $request, Program $program)
    {
        $validatedData = $request->validated();

        $program->courses()->attach($validatedData['course_id'], [
            'year_level' => $validatedData['year_level'],
            'semester' => $validatedData['semester']
        ]);
        return redirect()->route('program-courses.edit', $program->id)->with('success', 'New record has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
