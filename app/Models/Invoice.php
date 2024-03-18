<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'sale_id',
        'title',
        'engine',
        'chassis',
        'model',
        'color',
        'horse_power',
        'maker',
        'buyer_name',
        'buyer_father',
        'buyer_cnic',
        'buyer_phone',
        'buyer_address',
        'buyer_status',
        'status',
    ];


    public function paymentable()
    {
        return $this->morphTo();
    }
    public function sale()
    {
        return $this->hasOne(SaleDetail::class, 'id', 'sale_id');
    }
}
