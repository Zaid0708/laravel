<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< Updated upstream
        'name',
        'email',
        'password',
        'phone_number',
        'role_id',
=======
        'name', 'email', 'phone_number', 'password', 'role_id',
>>>>>>> Stashed changes
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
<<<<<<< Updated upstream
    protected $appends = [
        'profile_photo_url',
    ];
=======
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the hotels managed by the user (if the user is a hotel owner or admin).
     */
       // Assuming the role_id of 2 represents an owner
    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'owner_id', 'id');
    }

    /**
     * Get the role of the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
>>>>>>> Stashed changes
}
