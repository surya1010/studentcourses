<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;

use Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payment::orderBy('id','desc')->get();
        return view('payments.index')->with(compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
                'amount' => 'required',
                'date' => 'required',

            ]);
        

        $payment = new Payment();
        $payment->code = str_random(6);
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        $payment->save();

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan payment $payment->name",
            ]);
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $payment = Payment::find($id);
        return view('payments.show')->with(compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $payment = Payment::find($id);

        return view('payments.edit')->with(compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'amount' => 'required',
                'date' => 'required',

            ]);

        $payment = Payment::find($id);
        if(!$request->input('code') || empty($request->input('code')))
        {
            $code = $payment->code;
        }
        $payment->amount = $request->input('amount');
        $payment->date = $request->input('date');
        $payment->save();

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan",
            ]);
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Payment::destroy($id);
        //$payments->delete();
        Session::flash("flash_notification" , [
        "level" => "success" ,
        "message" => "payments berhasil dihapus"
        ]);
        return redirect()->route('payments.index');
    }
}
