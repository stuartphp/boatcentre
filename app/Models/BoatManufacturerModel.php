<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatManufacturerModel extends Model
{
    use HasFactory;
    protected $table ='boat_manufacturer_models';
    protected $fillable = [
        'boat_manufacturer_id',
        'model',
        'specifications'
        ];

}