<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->morphMany(Payment::class,'paymentable');
    }
}
