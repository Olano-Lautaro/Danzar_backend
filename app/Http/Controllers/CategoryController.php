<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return $category;
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
        
        $category = Category::create([
            'name' => $request->name, //Creo un nuevo dato.
        ]);

       
        return ($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::WHERE('ID',$id)->get(); //Busco datos especificos con un id
        return $category;
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save(); //Le cambio los datos dependiendo el parametro ingresado.
 
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            Category::destroy($id);
            return ("Ha sido borrado");
         //Elimino el dato dependiendo el parametro ingresado ( ID )
    }
}
