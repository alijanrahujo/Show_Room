<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'amount',
        'description',
    ];

    public function installmentable()
    {
        return $this->morphTo();
    }
}
