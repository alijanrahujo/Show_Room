<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'sale_id',
        'purchase_amount',
        'sale_amount',
        'recived',
        'pending',
        'profit',
        'status',
    ];

    public function payment()
    {
        return $this->hasOne(SalePayment::class, 'sale_id', 'id');
    }
}
