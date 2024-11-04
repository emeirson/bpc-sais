<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassCourseRequest;
use App\Http\Requests\UpdateClassCourseRequest;
use App\Models\ClassCourse;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Room;
use App\Models\Semester;
use Illuminate\Http\Request;

class ClassCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('class-course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class-course.create', [
            'courses' => Course::all(),
            'instructors' => Instructor::all(),
            'rooms' => Room::all(),
            'terms' => Semester::with('academicYear')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassCourseRequest $request)
    {
        $validatedData = $request->validated();
        ClassCourse::create($validatedData);

        return redirect()->route('class-course.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassCourse $classCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassCourse $classCourse)
    {
        return view('class-course.edit', [
            'class' => $classCourse,
            'courses' => Course::all(),
            'instructors' => Instructor::all(),
            'rooms' => Room::all(),
            'terms' => Semester::with('academicYear')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassCourseRequest $request, ClassCourse $classCourse)
    {
        $validatedData = $request->validated();
        $classCourse->update($validatedData);

        return redirect()->route('class-course.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassCourse $classCourse)
    {
        $classCourse->delete();

        return redirect()->route('class-course.index')->with('success', 'Record removed successfully.');
    }
}
