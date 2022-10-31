<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Order;

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

    protected $attributes = [
        'is_blocked' => 0,
        'is_active' => 1,
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'info');
    }

    public function order()
    {
        return $this->hasMany(Order::class); 
    }
}
