<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $table ="dealers";
    protected $fillable = [
        'account_number',
        'registered_name',
        'trading_name',
        'vat_number',
        'physical_address',
        'contact_person',
        'mobile',
        'office_number',
        'website',
        'email',
        'logo',
        'is_active',
    ];

    public function boats()
    {
        return $this->hasMany(Boat::class);
    }
}
