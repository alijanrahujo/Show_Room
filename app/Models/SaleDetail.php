<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fullable = [
        'sale_id',
        'tc_no',
        'register_no',
        'purchase_id',
        'type',
        'title',
        'engine',
        'chassis',
        'model',
        'horse_power',
        'color',
        'pre_refrence',
        'sale_amount',
        'sale_tax',
        'total',
        'fitting_price',
        'reg_fee',
        'guarantor_name',
        'guarantor_father',
        'owner_name',
    ];


    public function sale()
    {
        return $this->hasOne(Sale::class, 'id', 'sale_id');
    }
}
