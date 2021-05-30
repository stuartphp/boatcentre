<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockItem;
use App\Models\StockCategory;
use App\Models\Counter;
use Image;
use PHPUnit\Framework\Constraint\Count;

class StockItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StockItem::with('category')->orderBy('name')->paginate(15);
        return view('admin.stock.items', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $file = request()->file('image');
        if($file)
        {
            $img = Image::make($file);
            $path = public_path("images/stock");
            $name = time().'.'.$file->getClientOriginalExtension();
            $img->save($path.'/'.$name);
            $data['image'] = $name;
        }
        if(empty($data['code']))
        {
            $nr = Counter::where('name', 'stock')->first();
            $data['code']=$nr->prefix.$nr->number;
            $nr->number++;
            $nr->save();
        }
        if(!is_int(request('stock_category_id')))
        {
            // Geteate Category
            $cat_id = StockCategory::create([
                'name'=>request('stock_category_id')
            ]);
            $data['stock_category_id']=$cat_id->id;
        }

        //dd($data);
        StockItem::create($data);
        return redirect('admin/stock/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StockItem::findOrFail($id);
        return response()->json(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = StockItem::findOrFail($id);
        return response()->json(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();
        $file = request()->file('image');
        if($file)
        {
            $img = Image::make($file);
            $path = public_path("images/stock");
            $name = time().'.'.$file->getClientOriginalExtension();
            $img->save($path.'/'.$name);
            $data['image'] = $name;
        }
        if(empty($data['code']))
        {
            $nr = Counter::where('name', 'stock')->first();
            $data['code']=$nr->prefix.$nr->number;
            $nr->number++;
            $nr->save();
        }
        if(! (int)request('stock_category_id'))
        {
            // Geteate Category
            $cat_id = StockCategory::create([
                'name'=>request('stock_category_id')
            ]);
            $data['stock_category_id']=$cat_id->id;
        }

        $rec = StockItem::findOrFail($id);
        $rec->update($data);
        return redirect('/admin/stock/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
