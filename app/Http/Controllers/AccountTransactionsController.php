<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountTransaction as at;
use App\AccountBalance as ab;
use App\Http\Resources\AccountTransactionResource as atr;

class AccountTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($acct_id)
    {
      $at = at::where('acct_id',$acct_id)
      ->orderBy('date')->paginate(10);
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
        $bal = ab::firstOrCreate(
            ['acct_id' => $request->acct_id]
        );

        if ($request->type == 'Deposit') {
            $in = $bal->increment('balance',$request->amount);
        } else {
            $in = $bal->decrement('balance',$request->amount);
        }
        if ($in) {
            $at = new at;
            $at->date = $request->date;
            $at->amount = $request->amount;
            $at->type = $request->type;
            $at->detail = $request->detail;
            $at->acct_id = $request->acct_id;

            if ($at->save()) {
              return new atr($at);
            }
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
