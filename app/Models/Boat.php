<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;
    protected $table ="boats";
    protected $fillable = [
'reference',
'company_id',
'vin_number',
'name',
'keywords',
'category_id',
'cof',
'brand',
'model',
'manufacturer',
'year_of_manufacture',
'main_color',
'new_used',
'condition',
'province',
'city',
'short_description',
'description',
'currency',
'retail_price',
'is_feature',
'special_price',
'special_start',
'special_end',
'viewed',
'weight',
'loa',
'beam',
'draft',
'crew',
'passengers',
'fuel_type',
'fuel_tank',
'max_speed',
'hull_construction',
'youtube_link',
'fb_link',
'is_sold',
'is_approved',
'is_active',

    ];
}
