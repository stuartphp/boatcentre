<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteBanner extends Model
{
    use HasFactory;
    protected $table ='website_banners';
    protected $fillable =[
        'image',
        'slogan',
        'title',
        'link',
        'is_active'
    ];
}
