<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boat;
use App\Models\BoatManufacturer;
use Illuminate\Support\Facades\DB;
use Validator;

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
        $action='add';
        return view('admin.boats.create', compact('manufacturers', 'action'));
    }

    public function store()
    {
        $data = request()->all();
        $data['dealer_id']=1;
        $error = Validator::make($data, $this->validation());
        if($error->fails())
        {
            return response()->json(['error'=>$error->errors()->all()]);
        }
        try{
            DB::beginTransaction();
            // Create Reference
            $ref = DB::table('counters')->where('name', 'boats')->first();
            $ref_nr = $ref->prefix.$ref->number;
            $data['reference']=$ref_nr;
            DB::table('counters')->where('id', $ref->id)->increment('number');
            Boat::create($data);

            DB::commit();
            return redirect('/admin/boats');
        } catch (\Exception $e){
            DB::rollBack();
            dd($e);
        }

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

    public function validation()
    {
        return [
            'dealer_id',
            'name',
            'boat_manufacturer_model_id'=>'required|integer',
            'boat_manufacturer_id'=>'required|integer',
            'year_of_manufacture'=>'required|numeric|max:4',
            'province_id'=>'required|integer',
            'city_id'=>'required|integer',
            'description'=>'required',
            'retail_price'=>'required|numeric',
            'special_price'=>'numeric',
            'special_start'=>'date',
            'special_end'=>'date'
        ];
    }
}
