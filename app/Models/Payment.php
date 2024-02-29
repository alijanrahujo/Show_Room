<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Dealer;
use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'total',
        'received',
        'pending',
        'description',
        'image',
        'status',
    ];

    public function paymentable()
    {
        return $this->morphTo();
    }
}
