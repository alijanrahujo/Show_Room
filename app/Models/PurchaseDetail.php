<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'title',
        'engine',
        'chassis',
        'model',
        'color',
        'purchase_amount',
        'purchase_id',
        'vehicle_id',
    ];

    public function getFullTitleAttribute()
    {
        return $this->title . ' (' . $this->model . ' - ' . $this->color . ')';
    }
}
