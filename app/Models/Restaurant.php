<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'address',
        'longitude',
        'latitude',
        'is_available',
        'is_blocked',
    ];

    protected $attributes = [
      'is_available' => 0,
      'is_blocked' => 0,
    ];

    public function menuCategory()
    {
        return $this->hasMany(MenuCategory::class);
    }
}
