<?php

namespace App\Models;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'owner_cnic',
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

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            $purchase_id = $model->purchase_id;
            $query = PurchaseDetail::where('purchase_id', $purchase_id)->where('status', 2)->count();
            if ($query == 0) {
                Purchase::where('id', $purchase_id)->update(['status' => 3]);
            }
        });
    }
}
