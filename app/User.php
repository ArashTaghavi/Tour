<?php

namespace App;

use App\Models\Hostel;
use App\Models\Hostle;
use App\Models\Hotel;
use App\Models\PeriodTour;
use App\Models\TourUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN = 0;
    const USER = 1;
    const HOSTEL = 2;
    const HOTEL = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tours()
    {
        return $this->belongsToMany(PeriodTour::class, TourUser::class)->using(TourUser::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function hostels()
    {
        return $this->hasMany(Hostel::class);
    }
}
