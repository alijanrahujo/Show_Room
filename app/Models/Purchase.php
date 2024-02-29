<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'type',
        'total_amount',
        'excluding_tax',
        'rate_tax',
        'paybel_tax',
        'including_tax',
        'status',
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

    public function purchaseDetail()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id', 'id');
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($dealer) {
            $dealer->payments()->delete();
        });
    }
}
