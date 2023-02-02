<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'category',
        'description',
        'price',
        'selling_price',
        'vendor_price',
        'image',
        'stock',
        'is_available',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function categorized()
    {
        return $this->hasOne(MenuCategory::class, 'id', 'category');
    }
}
