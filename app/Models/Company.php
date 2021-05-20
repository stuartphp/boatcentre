<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table ="companies";
    protected $fillable = [
'account_number',
'registred_name',
'trading_name',
'vat_number',
'physical_address',
'contact_person',
'mobile',
'office_number',
'website',
'email',
'logo',
    ];
}
