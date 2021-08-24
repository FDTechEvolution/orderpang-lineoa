<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Order extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'user_id',
        'body',
        'payment_method',
        'status',
        'code'
    ];

    protected $hidden = [
        'user_id',
        'status'
    ];
}
