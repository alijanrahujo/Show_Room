<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'type',
        'title',
        'engine',
        'chassis',
        'model',
        'color',
        'horse_power',
        'vehicle_id',
        'name',
        'father_name',
        'cnic',
        'phone',
        'address',
        'ref_name',
        'ref_father',
        'ref_cnic',
        'ref_phone',
        'ref_address',
        'description',
        'payment',
        'image',
        'file',
        'status',
    ];

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
