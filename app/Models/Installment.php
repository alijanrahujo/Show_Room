<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'amount',
        'paid_date',
        'paid_amount',
        'due_amount',
        'description',
        'status',
    ];

    public function installmentable()
    {
        return $this->morphTo();
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
