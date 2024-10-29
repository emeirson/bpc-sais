<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('colleges.index', [
            'colleges' => College::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollegeRequest $request)
    {
        $validatedData = $request->validated();
        College::create($validatedData);

        return redirect()->route('colleges.index')->with('success', 'New record has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(College $college)
    {
        return view('colleges.edit', [
            'college' => $college
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollegeRequest $request, College $college)
    {
        $validatedData = $request->validated();
        $college->update($validatedData);

        return redirect()->route('colleges.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        $college->delete();

        return redirect()->route('colleges.index')->with('success', 'Record removed successfully.');
    }
}
