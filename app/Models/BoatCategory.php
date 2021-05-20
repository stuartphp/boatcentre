<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatCategory extends Model
{
    use HasFactory;
    protected $table ='boat_categories';
    protected $fillable = [
        'name',
        'parent_id',
        'is_active'
    ];
    public function parent()
    {
        return $this->hasMany(BoatCategory::class, 'parent_id');
    }
}
