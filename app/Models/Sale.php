<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'type',
        'customer_id',
        'amount',
        'installment',
        'months',
        'down_payment_amount',
        'status',
    ];


    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->hasOne(SalePayment::class, 'sale_id');
    }

    public function saleDetail()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function installments()
    {
        return $this->morphMany(Installment::class, 'installmentable');
    }

    public function getPaidAmountAttribute()
    {
        return $this->payments->sum('received') ?? 0;
    }

    public function getDueAmountAttribute()
    {
        return ($this->amount ?? 0) - ($this->payments->sum('received') ?? 0);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            // Delete related payments and installments
            $model->payments()->delete();
            $model->installments()->delete();

            // Get purchase_ids related to the sale
            $purchase_ids = SaleDetail::where('sale_id', $model->id)->pluck('purchase_id');

            // Update PurchaseDetail statuses to 2
            PurchaseDetail::whereIn('id', $purchase_ids)->update([
                'status' => 2
            ]);

            // Check if all purchases related to the sale are now in status 2
            foreach ($purchase_ids as $purchase_id) {
                $count = PurchaseDetail::where('purchase_id', $purchase_id)->where('status', 3)->count();
                if ($count == 0) {
                    Purchase::where('id', $purchase_id)->update(['status' => 2]);
                }
            }
        });
    }

}
