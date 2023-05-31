<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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

    protected $with = ['media'];

    public function menuCategory()
    {
        return $this->hasMany(MenuCategory::class);
    }
}
