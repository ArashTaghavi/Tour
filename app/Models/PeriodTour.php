<?php

namespace App\Models;

use App\Model\Tour;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PeriodTour extends Model
{
    protected $fillable = ['tour_id', 'start_date', 'end_date', 'discount'];


    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function length()
    {
        $date1 = date_create($this->start_date);
        $date2 = date_create($this->end_date);
        $diff = date_diff($date1, $date2);
        return $diff->days;
    }

    public function pricePerDay($price)
    {
        return $this->length() > 0 ? round($price / $this->length(), 2) : 0;
    }

    public function byDiscount($price)
    {
        return round(($price - ($price * $this->discount / 100)), 2);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,TourUser::class)->using(TourUser::class);
    }
}
