<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'particulars',
        'date',
        'debit',
        'credit',
        'balance',
    ];

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
