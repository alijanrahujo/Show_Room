<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Dealer;
use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'type',
        'total',
        'received',
        'pending',
        'description',
        'image',
        'status',
    ];

    protected $appends = ['status'];

    public function paymentable()
    {
        return $this->morphTo();
    }


    public function getStatusAttribute()
    {
        $status = 0;
        if($this->total == $this->received)
        {
            $status = '<span class="badge badge-success">'.status(6).'</span>';
        }
        else if($this->received == 0)
        {
            $status = '<span class="badge badge-danger">'.status(4).'</span>';
        }
        else
        {
            $status = '<span class="badge badge-warning">'.status(5).'</span>';
        }
        return $status;
    }
}
