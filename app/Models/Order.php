<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Deliveryman;

class Order extends Model
{
    use HasFactory;

    // status: pending, processing, delivery, completed
    protected $fillable=[
        "order_no",
        "dispatch_lat",
        "dispatch_long",
        "deliveryman_id",
        "customer_id",
        "status",
        "payment_no",
        "distance_km",
    ];

    protected $attributes = [
        'deliveryman_id' => null,
        'payment_no' => null,
        'status' => 'pending',
        'distance_km' => null,
    ];

    public function customer() 
    {
        return $this->belongsTo(Customer::class);
    }

    public function deliveryman() 
    {
        return $this->belongsTo(Deliveryman::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
