<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boat;
use App\Models\BoatManufacturer;
use App\Models\Province;

class BoatsController extends Controller
{
    public function index()
    {
        // $data = Boat::paginate(15);
        // return view('admin.boats.index', compact('data'));
        return view(('admin.boats'));
    }

    public function create()
    {
        $provinces =Province::orderBy('name')->pluck('name', 'id')->toArray();
        $manufacturers = BoatManufacturer::orderBy('name')->pluck('name', 'id')->toArray();
        return view('admin.boats.create', compact('manufacturers', 'provinces'));
    }
}
