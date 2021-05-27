<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatImage extends Model
{
    use HasFactory;
    protected $table ='boat_images';
    protected $fillable =
    [
        'boat_id',
        'image',
        'sort_order',
    ];

    public function boat()
    {
      return $this->belongsTo(Boat::class);
    }
}
