<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_type',
        'horse_power',
        'reg_fee',
        'purchase_price',
        'purchase_tax',
        'sale_price',
        'sale_tax',
        'status',
    ];
}
