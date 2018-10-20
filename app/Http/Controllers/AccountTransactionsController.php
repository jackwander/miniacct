<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountTransaction as at;
use App\Http\Resources\AccountTransactionResource as atr;

class AccountTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $at = at::where('acct_id',$request->acct_id)
      ->orderBy('date')->get();
      return atr::collection($at);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $at = new at;
        $at->date = $request->date;
        if ($request->type == "Deposit") {
            $at->deposit = $request->amount;
        } else {
            $at->withdraw = $request->amount;
        }
        $at->detail = $request->detail;
        $at->acct_id = $request->acct_id;

        if ($at->save()) {
          return new atr($at);
        }
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
