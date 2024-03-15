<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'father_name',
        'address',
        'phone',
        'cnic',
        'status',
    ];

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function purchaseable()
    {
        return $this->morphMany(Purchase::class, 'purchaseable');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id', 'id');
    }

    public function getTotalAmountAttribute()
    {
        return $this->sales->sum('amount') ?? 0;
    }

    public function getPaidAmountAttribute()
    {
        $paidAmount = 0;
        foreach ($this->sales as $sale) {
            $paidAmount += $sale->payments->sum('received');
        }
        return $paidAmount;
    }

    public function getDueAmountAttribute()
    {
        $dueAmount = 0;
        foreach ($this->sales as $sale) {
            $dueAmount += $sale->amount - $sale->payments->sum('received');
        }
        return $dueAmount;
    }
}
