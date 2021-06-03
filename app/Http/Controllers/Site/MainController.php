<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        if(!session()->get('currency'))
        {
            session()->put('currency', 'ZAR');
            session()->put('cur_symbol', 'R');
            session()->put('cur_ratio', 1);
        }
        return view('site.index', ['categories'=>$this->getCategories()]);
    }

    public function currency($id){
        switch($id)
        {
            case 'ZAR':
                session()->put('currency', 'ZAR');
                session()->put('cur_symbol', 'R');
                session()->put('cur_ratio', 1);
                break;
            case 'USD':
                session()->put('currency', 'USD');
                session()->put('cur_symbol', '$');
                session()->put('cur_ratio', 14.5);
                break;
        }
        return redirect()->back();
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
