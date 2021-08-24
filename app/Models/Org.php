<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Org extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'orgid',
        'name',
        'line_notify_token',
        'status',
    ];

    protected $hidden = [
        'status'
    ];
}
