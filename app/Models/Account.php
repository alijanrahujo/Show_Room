<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_holder',
        'account_number',
        'bank',
        'branch_name',
        'branch_code',
        'status',
    ];
}
