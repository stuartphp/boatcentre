<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoatManufacturerModel;
use App\Models\SaPostalCode;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function manufacturers()
    {
        $id = request('id');
        $res = BoatManufacturerModel::where('boat_manufacturer_id', $id)->orderBy('model')->pluck('model', 'id')->toArray();
        $z=[];
        foreach($res as $k=>$v)
        {
            $z[]=['id'=>$k, 'val'=>$v];
        }
        return response()->json($z);
    }
    public function city()
    {
        $id = request('id');
        $res = SaPostalCode::where('province', $id)->orderBy('city')->groupBy('city')->pluck('city', 'id')->toArray();
        foreach($res as $k=>$v)
        {
            $z[]=['id'=>$k, 'text'=>$v];
        }
        return response()->json($z);
    }

    public function models()
    {
        $id=request('id');
        $res = BoatManufacturerModel::find($id);
        return response()->json($res->specifications);
    }

}
