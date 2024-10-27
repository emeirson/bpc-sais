<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('programs.index', [
            'programs' => Program::latest()->with('department')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programs.create', [
            'departments' => Department::all(),
            'courses' => Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $validatedData = $request->validated();
        Program::create($validatedData);

        return redirect()->route('programs.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Record removed successfully.');
    }
}
