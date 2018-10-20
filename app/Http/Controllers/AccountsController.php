<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserHandler as User;
use App\Account;
use App\Http\Resources\AccountsResource;
use Illuminate\Support\Facades\Session;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
      $user = User::findOrFail($id);
      $accounts = Account::where('user_id',$user->id)
      ->orderBy('acct_name')->paginate(5);
      return AccountsResource::collection($accounts);
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
      $check = Account::where([
        ['acct_name','=',$request->acct_name],
        ['user_id','=',$request->user_id]
      ])->count();

      if ($check==0) {
        $acct = new Account;
        $acct->acct_name = $request->acct_name;
        $acct->acct_detail = $request->acct_detail;
        $acct->user_id = $request->user_id;
        $acct->slug = uniqid();

        if ($acct->save()) {
          return new AccountsResource($acct);
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
      $accounts = Account::where('acct_id',$id)->get();
      return AccountsResource::collection($accounts);
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
        $acct = Account::findOrFail($id);
        $acct->acct_name = $request->acct_name;
        $acct->acct_detail = $request->acct_detail;
        if ($acct->save()) {
            return new AccountsResource($acct);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $acct = Account::findOrFail($id);

      if ($acct->delete()) {
        return new AccountsResource($acct);
      }
    }
  }
