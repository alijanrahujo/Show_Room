<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'engine',
        'chassis',
        'model',
        'color',
        'vehicle_id',
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
