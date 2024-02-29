<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'vehicle_id',
        'customer_id',
        'cnic',
        'phone',
        'name',
        'father_name',
        'address',
        'owner_name',
        'owner_father',
        'owner_cinc',
        'owner_address',
        'engine',
        'title',
        'chassis',
        'model',
        'color',
        'horse_power',
        'maker',
        'tc_no',
        'register_no',
        'type',
        'purchase_amount',
        'purchase_tax',
        'total',
        'do_number',
        'do_date',
        'status',
    ];

    public function getFullTitleAttribute()
    {
        return $this->title . ' (' . $this->model . ' - ' . $this->color . ' - Ch: ' . $this->chassis .')';
    }
    public function vehicle()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

}
