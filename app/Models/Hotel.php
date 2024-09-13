<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'description',
        'rating',
        'owner_id',
        'hotel_image',
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
