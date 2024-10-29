<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sections.index', [
            'section' => Section::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.create', [
            'semesters' => Semester::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $validatedData = $request->validated();
        Section::create($validatedData);
        return redirect()->route('sections.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return view('sections.edit', [
            'section' => $section,
            'semesters' => Semester::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
