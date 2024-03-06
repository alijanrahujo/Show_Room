<?php

namespace App\Models;

use App\Models\Installment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'type',
        'customer_id',
        'amount',
        'installment',
        'months',
        'status',
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
    public function saleDetail()
    {
        return $this->hasMany(SaleDetail::class, 'sale_id', 'id');
    }

    public function installments()
    {
        return $this->morphMany(Installment::class, 'installmentable');
    }
}
