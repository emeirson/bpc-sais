<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Department;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('instructors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructors.create', [
            'departments' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructorRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['instructor_code'] = Instructor::generateInstructorId();
        Instructor::create($validatedData);

        return redirect()->route('instructors.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', [
            'instructor' => $instructor,
            'departments' => Department::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $validatedData = $request->validated();
        $instructor->update($validatedData);

        return redirect()->route('instructors.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
