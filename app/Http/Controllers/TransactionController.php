<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use JWTAuth;
use App\Models\Transaction;
use Validator;

class TransactionController extends Controller
{

    protected $transactions;
    public function __construct(Transaction $transactions){
        $this->transactions = $transactions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'quantity' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
        $validator = Validator::make($request->toArray(), $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $newTrans = [
            'quantity' => $request->quantity,
            'address' => $request->address,
            'total_price' => $request->total_price,
            'payment' => $request->payment,
            'user_id' => $request->user_id,
            'recipe_id' => $request->recipe_id,
            'phone' => $request->phone,
        ];
            $newTrans = $this->transactions->create($newTrans);

            return $newTrans;
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
        //
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
    }
}
