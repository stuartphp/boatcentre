<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function index()
    {
        return view('site.showroom.index');
    }
    public function detail()
    {
        return view('site.showroom.detail');
    }
}
