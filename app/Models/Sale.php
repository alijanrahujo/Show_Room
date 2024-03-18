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

    protected $appends = ['paid_amount', 'due_amount', 'status'];

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
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

    public function getStatusAttribute()
    {
        $status = 0;
        if ($this->amount == $this->payments->sum('received')) {
            $status = '<span class="badge badge-success">' . status(6) . '</span>';
        } else if ($this->payments->sum('received') == 0) {
            $status = '<span class="badge badge-danger">' . status(4) . '</span>';
        } else {
            $status = '<span class="badge badge-warning">' . status(5) . '</span>';
        }
        return $status;
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
