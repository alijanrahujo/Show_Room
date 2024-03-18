<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'amount',
        'paid_date',
        'paid_amount',
        'due_amount',
        'description',
        'status',
    ];

    protected $appends = ['status'];

    public function installmentable()
    {
        return $this->morphTo();
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function getStatusAttribute()
    {
        $status = 0;
        if($this->amount == $this->paid_amount)
        {
            $status = '<span class="badge badge-success">'.status(6).'</span>';
        }
        else if($this->paid_amount == 0)
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
