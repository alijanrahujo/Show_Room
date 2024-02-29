<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'dealer_name',
        'phone',
        'cnic',
        'address',
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

    public function getFullCompanyAttribute()
    {
        return $this->company_name . ' (' . $this->dealer_name . ')';
    }
}
