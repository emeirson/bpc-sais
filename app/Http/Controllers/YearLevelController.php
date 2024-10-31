<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreYearLevelRequest;
use App\Http\Requests\UpdateYearLevelRequest;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class YearLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('year-levels.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('year-levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreYearLevelRequest $request)
    {
        $validatedData = $request->validated();
        YearLevel::create($validatedData);

        return redirect()->route('year-levels.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(YearLevel $yearLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YearLevel $yearLevel)
    {
        return view('year-levels.edit', [
            'level' => $yearLevel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateYearLevelRequest $request, YearLevel $yearLevel)
    {
        $validatedData = $request->validated();
        $yearLevel->update($validatedData);

        return redirect()->route('year-levels.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YearLevel $yearLevel)
    {
        $yearLevel->delete();

        return redirect()->route('year-levels.index')->with('success', 'Record removed successfully.');
    }
}
