<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliveryman extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        "phone_no",
        "address",
        "plate_no",
        "vehicle_id",
        "profile_image",
        "is_blocked",
        "is_active",
    ];
}
