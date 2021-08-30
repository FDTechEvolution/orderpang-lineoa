<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Order extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'id',
        'user_id',
        'body',
        'payment_method',
        'status',
        'code'
    ];

    protected $hidden = [
        'user_id',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
