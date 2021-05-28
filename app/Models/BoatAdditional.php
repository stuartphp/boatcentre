<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatAdditional extends Model
{
    use HasFactory;
    protected $table = "boat_additionals";
    protected $fillable = [
        'boat_id',
        'name',
        'value',
    ];
    public function boat()
    {
      return $this->belongsTo(Boat::class);
    }
}
