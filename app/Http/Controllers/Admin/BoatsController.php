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
        $action='create';
        return view('admin.boats.form', compact('manufacturers', 'action'));
    }

    public function store()
    {
        $data = request()->all();
        $data['dealer_id']=auth()->user()->dealer_id;
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
            $data['is_feature'] = request('is_feature') ? 1:0;
            $data['is_sold'] = request('is_sold') ? 1:0;
            $data['is_approved'] = request('is_approved') ? 1:0;
            $data['is_active'] = request('is_active') ? 1:0;
            DB::table('counters')->where('id', $ref->id)->increment('number');
            Boat::create($data);
            DB::commit();
            return response()->json(['success'=>'yes']);
        } catch (\Exception $e){
            DB::rollBack();
            dd($e);
        }

    }

    public function edit($id)
    {
        $data = Boat::find($id);
        $manufacturers = BoatManufacturer::orderBy('name')->pluck('name', 'id')->toArray();
        $action='update';
        return view('admin.boats.form', compact('data', 'manufacturers', 'action'));
    }

    public function update($id)
    {
        $data = request()->all();
        $data['is_feature'] = request('is_feature') ? 1:0;
        $data['is_sold'] = request('is_sold') ? 1:0;
        $data['is_approved'] = request('is_approved') ? 1:0;
        $data['is_active'] = request('is_active') ? 1:0;
        $rec = Boat::findOrFail($id);
        $rec->update($data);
        return response()->json(['success'=>'yes']);
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
            'province_id'=>'required|integer',
            'city_id'=>'required|integer',
            'description'=>'required',
            'retail_price'=>'required|numeric',
            'special_price'=>'nullable|numeric',
            'special_start'=>'nullable|date',
            'special_end'=>'nullable|date'
        ];
    }
}
