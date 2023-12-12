<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $payments = Payment::select('payments.*', 'students.name', 'students.last_name')
            ->join('students', 'students.id', '=', 'payments.student_id')
            ->get();


        return $payments;
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
            'student_id' => 'required',
            // 'date' => 'required',
        ]);

        $currentDate= new Carbon;
        
        $payment = Payment::create([
            'student_id' => $request->student_id,
            'date' => $currentDate->now()->format('Y-m-d'),
            'amount' => $request->amount,
        ]);

        $id_payment = $payment->id;
        $items = $request->items;

        foreach ($items as $item) {

            $payment->items()->attach($id_payment, [
                "item_id" => $item['item_id'],
                "amount" => $item['amount']
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::where('id', $id)->get();

        

        $items = $payment->find($id)->items()->get();

        $registro = [
            "payment" => $payment,
            "items" => $items
        ];

        return $registro;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::where('id', $id)->get();

        $items = $payment->find($id)->items()->get();

        $registro = [
            "payment" => $payment,
            "items" => $items
        ];

        return $registro;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);

        $payment->student_id = $request->student_id;
        $payment->date = $request->date;
        $payment->amount= $request->amount;

        $payment->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        Payment::destroy($payment->id);
    }
}
