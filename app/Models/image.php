<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_id',
        'image_path',
        'description',
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Relationship to the Room model
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
