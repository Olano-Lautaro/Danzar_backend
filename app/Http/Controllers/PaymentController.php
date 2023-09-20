<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments= Payment::all();

        return $payments->toJson();
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
            'date' => 'required',
            'invoice_number' => 'required'
        ]);

        $payment = Payment::create([
            'student_id' => $request-> student_id,
            'date' => $request-> date,
            'invoice_number' => $request-> invoice_number,
        ]);

        $id_payment= $payment->id;
        $items = $request->items;
        
        foreach ($items as $item) {

            $payment->items()->attach($id_payment,[
                "item_id" =>$item["item_id"],
                "amount" =>$item["amount"]
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::where('id', $id)->get();

        return $payment->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::where('id', $id)->get();
        
        return $payment->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);

        $payment->student_id = $request->student_id;
        $payment->date = $request->date;
        $payment-> invoice_number = $request->invoice_number;

        $payment->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment_delete = Payment::destroy($payment);
    }
}
