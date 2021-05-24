<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boat;
use App\Models\BoatManufacturer;

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
        $manufacturers = BoatManufacturer::orderBy('name')->pluck('name', 'id')->toArray();
        return view('admin.boats.create', compact('manufacturers'));
    }

    public function store()
    {
        $data = request()->all();
        $data['company_id']=1;
        
        Boat::create(request()->all());
        return redirect('/admin/boats');
    }
}
