<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->dealer_id>0)
        {
            // Get Dealer Info
            $dealer = DB::table('dealers')->where('id', auth()->user()->dealer_id)->first();
            foreach($dealer as $k=>$v)
            {
                session()->put($k, $v);
            }

            return view('home');
        }else{
            switch(auth()->user()->profile)
            {
                case 2:
                    return view('auth.dealer');
                    break;
                default:
                    return view('auth.private');
                    break;
            }
        }

    }
}
