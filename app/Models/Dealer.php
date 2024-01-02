<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_name',
        'dealer_name',
        'phone',
        'cnic',
        'address',
        'status',
    ];

    public function payments()
    {
        return $this->morphMany(Payment::class,'paymentable');
    }
}
