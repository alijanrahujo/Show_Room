<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'engine',
        'chassis',
        'model',
        'color',
        'customer_id',
    ];

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function payment()
    {
        return $this->hasOne(SalePayment::class, 'sale_id', 'id');
    }
}
