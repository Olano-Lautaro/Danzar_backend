<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::All();
        return $student;
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

        $student = new Student();
        $student->name = $request->student["name"];
        $student->last_name = $request->student["last_name"];
        $student->address = $request->student["address"];
        $student->dni = $request->student["dni"];
        $student->phone_number = $request->student["phone_number"];
        $student->status = true; 
        $student->observations = $request->student["observations"];
        $student->birthdate = $request->student["birthdate"];

        $student->save();

        $items = $request->items;
        foreach ($items as $item) {
            $student->items()->attach($item, [
                "student_id" => $student->id
            ]);
        }


        return ($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::WHERE('ID', $id)->get(); //Busco datos especificos con un id
        $items = $student->find($id)->items()->get();
        


        $registro = [
            "student" => $student[0],
            "items" => $items
        ];

        return $registro;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::where('id', $id)->get();
        $items = $student->find($id)->items()->get();



        $registro = [
            "student" => $student[0],
            "items" => $items
        ];

        return $registro;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $student = Student::find($id);
        $student->name = $request->student["name"];
        $student->last_name = $request->student["last_name"];
        $student->address = $request->student["address"];
        $student->dni = $request->student["dni"];
        $student->phone_number = $request->student["phone_number"];
        $student->observations = $request->student["observations"];
        $student->birthdate = $request->student["birthdate"];
        $student->status = $request->student["status"];
        $student->save();

        $items = $request->items;
        
        DB::table('item_student')->where('student_id',$id)->delete();

        foreach ($items as $item) {
            $student->items()->attach($item, [
                "student_id" => $student->id
            ]);
        }


        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //si el student tiene relacionado algun item, payment no podrás ser eliminado.
        


        // $studentRelations = 
        // Student::select('students.*')
        // ->join('payments','payments.student_id','=','student.id')
        // ->get();


        // dd($studentRelations);



        Student::destroy($id);
        return ("Borrado con exito");
    }
}
