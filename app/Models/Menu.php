<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'menu_category_id`',
        'description',
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
        return $this->hasOne(MenuCategory::class);
    }
}
