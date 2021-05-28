<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Boat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowroomController extends Controller
{
    public function index()
    {
        $manufacturers = $this->getManufacturers();
        $categories = $this->getCategory();
        $boats = Boat::with('images')->paginate(9);
        return view('site.showroom.index', compact('boats', 'manufacturers', 'categories'));
    }
    public function detail($id)
    {
        $boat = Boat::with(['dealer','images', 'manufacturer', 'model','additionals'])->findOrFail($id);
        return view('site.showroom.detail', compact('boat'));
    }
    public function search()
    {
        dd(request()->all());
    }


    public function getManufacturers()
    {
        return DB::table('boat_manufacturers')->orderBy('name', 'asc')->pluck('name', 'id')->toArray();
    }

    public function getCategory()
    {
        return DB::table('boat_categories')->orderBy('parent_id', 'asc')->orderBy('name', 'asc')->get();
    }
}
