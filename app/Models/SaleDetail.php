<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fullable = [
        'sale_id',
        'tc_no',
        'register_no',
        'purchase_id',
        'type',
        'title',
        'engine',
        'chassis',
        'model',
        'horse_power',
        'color',
        'pre_refrence',
        'sale_amount',
        'sale_tax',
        'buyer_name',
        'buyer_father',
        'buyer_cnic',
        'buyer_phone',
        'buyer_address',
        'total',
        'fitting_price',
        'reg_fee',
        'guarantor_name',
        'guarantor_father',
        'owner_name',
    ];

    protected $appends = ['full_name', 'status'];

    public function sale()
    {
        return $this->hasOne(Sale::class, 'id', 'sale_id');
    }
    public function purchase()
    {
        return $this->hasOne(PurchaseDetail::class, 'id', 'purchase_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(VehicleType::class);
    }
    public function getFullNameAttribute()
    {
        return $this->sale->customer->customer_name ?? '';
    }
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }

    public function getStatusAttribute()
    {
        $status = 0;
        if ($this->sale->payments()->sum('received') >= $this->total) {
            $status = '<span class="badge badge-success">' . status(6) . '</span>';
        } else if ($this->sale->payments()->sum('received') == 0) {
            $status = '<span class="badge badge-danger">' . status(4) . '</span>';
        } else {
            $status = '<span class="badge badge-warning">' . status(5) . '</span>';
        }
        return $status;
    }
}
