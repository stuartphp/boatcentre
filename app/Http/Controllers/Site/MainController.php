<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('site.index', ['categories'=>$this->getCategories()]);
    }
    public function getCategories()
    {
        $html = '<option value="" selected>All Boats</option>';
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
