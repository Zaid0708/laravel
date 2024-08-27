<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_type',
        'price_per_night',
        'capacity',
        'description',
        'availability_status',
        'features',
        'bed',
        'bathroom',
        'services',
        'size',
    ];
    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
<<<<<<< Updated upstream
    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function reviews()
    {
        return $this->hasMany(review::class);
    }
=======
      public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
>>>>>>> Stashed changes
}
