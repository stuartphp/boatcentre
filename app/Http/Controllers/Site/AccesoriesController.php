<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockItem;

class AccesoriesController extends Controller
{
    public function index()
    {
        $data = StockItem::paginate(16);
        return view('site.accesories', compact('data'));
    }

    public function detail($id)
    {
        $data = StockItem::findOrFail($id);
        return view('site.accesories-detail', compact('data'));
    }
}