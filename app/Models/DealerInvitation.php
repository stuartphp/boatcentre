<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerInvitation extends Model
{
    use HasFactory;
    protected $table = 'dealer_invatations';
    protected $fillable = [
        'dealer_id',
        'name',
        'email',
        'token'
    ];
}
