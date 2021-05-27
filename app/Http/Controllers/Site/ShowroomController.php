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
        return view('site.showroom.index');
    }
    public function detail($id)
    {
        $boat = Boat::with(['dealer','images', 'manufacturer', 'model'])->findOrFail($id);
        return view('site.showroom.detail', compact('boat'));
    }
    public function search()
    {
        dd(request()->all());
    }


    public function getCategories()
    {
        $html = '';
        $cat = DB::table('boat_categories')->orderBy('parent_id', 'asc')->orderBy('name')->get();

        foreach($cat as $k)
        {
            if($k->parent_id==0)
            {
                $html .= '<optgroup label="'.$k->name.'">';
                foreach($cat as $sub)
                {
                    if($sub->parent_id == $k->id)
                    {
                        $html .='<option value="'.$sub->id.'">'.$sub->name.'</option>';
                    }
                }
                $html .= '</optgroup>';
            }
        }
        return $html;
    }
}
