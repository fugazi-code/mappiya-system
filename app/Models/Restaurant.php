<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        "name",
        "address",
        "longitude",
        "latitude",
        "is_available",
        "is_blocked"
    ];

    protected $attributes = [
      'is_available' => 0,
      'is_blocked' => 0,
  ];
}
