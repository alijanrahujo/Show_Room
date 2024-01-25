<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'total_amount',
        'excluding_tax',
        'rate_tax',
        'paybel_tax',
        'including_tax',
        'status'
    ];

    public function getFullTitleAttribute()
    {
        return $this->title . ' (' . $this->model . ' - ' . $this->color . ')';
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function purchaseable()
    {
        return $this->morphTo();
    }
}
