<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DealersController extends Controller
{
    public function index()
    {
        return view('admin.dealers');
    }

    public function info($id)
    {
        return view('admin.dealers_info', ['id'=>$id]);
    }
}
