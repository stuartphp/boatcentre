<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;
    protected $table ='stock_items';
    protected $fillable = [
        'code',
        'name',
        'unit',
        'stock_category_id',
        'description',
        'retail_price',
        'image',
        'on_hand',
        'is_active'
    ];

    public function category()
    {
        return $this->hasOne(StockCategory::class, 'id','stock_category_id');
    }
}
