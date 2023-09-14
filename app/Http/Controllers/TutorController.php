<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutors = Tutor::all();

        return $tutors->toJson();
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
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'dni' => 'required'  
        ]);

        $tutor = Tutor::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dni'=> $request->dni  
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tutor = Tutor::where('id', $id)->get();

        return $tutor->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tutor = Tutor::where('id', $id)->get();

        return $tutor->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $tutor = Tutor::find($id);

        $tutor->name = $request->name;
        $tutor->last_name = $request->last_name;
        $tutor->email = $request->email;
        $tutor->phone_number = $request->phone_number;
        $tutor->dni = $request->dni;

        $tutor->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutor = Tutor::destroy($id);
    }
}
