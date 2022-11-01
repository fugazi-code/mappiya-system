<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    // status: pending, paid; type: cash, gcash
    public $fillable = [
        "payment_no",
        "amount",
        "status",
        "type",
    ];
}
