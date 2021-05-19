<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * switch(auth()->user()->profile)
         * {
         *  case 1: // Admin
         *  break;
         *  case 2: // Dealer
         *  break;
         *  case 3: // Private
         *  break;
         * }
         */
        return view('home');
    }
}
