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
        'type',
        'type_id',
        'total',
        'recived',
        'pending',
        'user_type',
        'user_id',
        'status',
    ];

    public function paymentable()
    {
        return $this->morphTo();
    }
}
