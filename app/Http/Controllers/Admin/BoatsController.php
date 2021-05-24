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

    public function edit($id)
    {
        $data = Boat::find($id);
        $manufacturers = BoatManufacturer::orderBy('name')->pluck('name', 'id')->toArray();
        return view('admin.boats.edit', compact('data', 'manufacturers'));
    }

    public function update($id)
    {
        $data = request()->all();
        $rec = Boat::findOrFail($id);
        $rec->update($data);
        return redirect('/admin/boats');
    }

    public function images($id)
    {
        return view('admin.boats.images', ['id'=>$id]);
    }
    //SELECT sum(retail_price * on_hand) as total FROM `stock_items` WHERE is_active=1 and (on_hand > 0 or on_hand <1000)
}
