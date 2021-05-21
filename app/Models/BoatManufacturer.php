<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatManufacturer extends Model
{
    use HasFactory;
    protected $table ='boat_manufacturers';
    protected $fillable = [
        'name'
        ];
    public function models()
    {
        return $this->hasMany(BoatManufacturerModel::class, 'boat_manufacturer_id', 'id');
    }
}