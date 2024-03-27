<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function installments()
    {
        return $this->morphMany(Installment::class, 'installmentable');
    }

    public function getStatusAttribute()
    {
        $status = 0;
        if($this->purchaseDetail()->where('status',2)->first())
        {
            $status = '<span class="badge badge-success">'.status(2).'</span>';
        }
        else
        {
            $status = '<span class="badge badge-danger">'.status(3).'</span>';
        }
        return $status;
    }

    public function getDueAmountAttribute()
    {
        return ($this->total_amount ?? 0) - ($this->payments->sum('received') ?? 0);
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($dealer) {
            $dealer->payments()->delete();
            $dealer->installments()->delete();

        });
    }
}
