<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Account;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (session('user-id') == null) {
        Session::put('user-id',Auth::user()->id);
      }
        return view('dashboard');
    }

    public function accounts()
    {
      return view('accounts.index');
    }

    public function viewAccount($slug)
    {
      $acct = Account::where('slug',$slug)->first();
      return view('accounts.account')->with('acct',$acct);
    }
}
