<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'type_id',
        'total',
        'recived',
        'pendig',
        'user_type',
        'user_id',
        'status',
    ];
}
