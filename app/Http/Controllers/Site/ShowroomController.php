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
        $category = request('category');
        $condition = request('condition');
        $price = request('price_range');

        $categories = $this->getCategories($category);

        $boats = $this->search($category, $condition, $price);

        return view('site.showroom.index', compact('boats', 'categories', 'category', 'condition', 'price'));
    }
    public function detail($id)
    {
        $boat = Boat::with(['dealer','images', 'manufacturer', 'model','additionals'])->findOrFail($id);
        return view('site.showroom.detail', compact('boat'));
    }
    public function search($category, $condition, $price)
    {
        if(!empty($category) && !empty($condition) && !empty($price))
        {
            return Boat::with('images')
                    ->where('condition', $condition)
                    ->where('boat_category_id', $category)
                    ->whereBetween('retail_price', $this->priceRange($price))
                    ->paginate(12);
        }
        if(!empty($category) && !empty($condition))
        {
            return Boat::with('images')
                    ->where('condition', $condition)
                    ->where('boat_category_id', $category)
                    ->paginate(12);
        }
        if(!empty($category) && !empty($price))
        {
            return Boat::with('images')
                    ->where('boat_category_id', $category)
                    ->whereBetween('retail_price', $this->priceRange($price))
                    ->paginate(12);
        }
        if(!empty($condition) && !empty($price))
        {
            return Boat::with('images')
                    ->where('boat_category_id', $condition)
                    ->whereBetween('retail_price', $this->priceRange($price))
                    ->paginate(12);
        }
        if(!empty($condition))
        {
            return Boat::with('images')
                    ->where('boat_category_id', $condition)
                    ->paginate(12);
        }
        if(!empty($category))
        {
            return Boat::with('images')
                    ->where('boat_category_id', $category)
                    ->paginate(12);
        }
        if(!empty($price))
        {
            return Boat::with('images')
                    ->whereBetween('retail_price', $this->priceRange($price))
                    ->paginate(12);
        }


        return Boat::with('images')->paginate(12);
    }

    public function priceRange($val)
    {
        switch($val)
        {
            case '1':
                return [0, 10000];
                break;
            case '2':
                return [10000, 25000];
                break;
            case '3':
                return [25000, 50000];
            case '4':
                return [50000, 100000];
                break;
            case '5':
                return [100000, 250000];
                break;
            case '6':
                return [250000, 500000];
                break;
            case '7':
                return [500000, 1000000];
                break;
            case '8':
                return [1000000, 3000000];
                break;
            case '9':
                return [3000000, 5000000];
                break;
            case '10':
                return [5000000, 10000000];
                break;
            case '11':
                return [10000000, 20000000];
                break;
            case '12':
                return [20000000, 1000000000];
        }

    }

    public function getCategories($id=0)
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
                        $sel='';
                        if($sub->id == $id)
                        {
                            $sel = 'selected';
                        }
                        $html .='<option value="'.$sub->id.'" '.$sel.'>'.$sub->name.'</option>';
                    }
                }
                $html .= '</optgroup>';
            }
        }
        return $html;
    }
}
