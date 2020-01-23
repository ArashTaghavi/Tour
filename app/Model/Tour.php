<?php

namespace App\Model;

use App\Models\ImageTour;
use App\Models\ItineraryTour;
use App\Models\TourUser;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tour extends Model
{
    protected $guarded = ['id'];

    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public $casts = [
        'tags' => 'array',
        'trips' => 'array',
        'travel_style' => 'array',
        'transportation' => 'array'
    ];

    public function images()
    {
        return $this->hasMany(ImageTour::class);
    }

    public function length()
    {
        $date1 = date_create($this->start_date);
        $date2 = date_create($this->end_date);
        $diff = date_diff($date1, $date2);
        return $diff->days;
    }

    public function pricePerDay()
    {
        return   $this->length() > 0 ? round($this->price / $this->length(), 2) : 0;
    }

    public function byDiscount()
    {
        return round(($this->price - ($this->price * $this->discount / 100)), 2);
    }

    public function itineraryTour()
    {
        return $this->hasMany(ItineraryTour::class);
    }

    public function users()
    {

        return $this->belongsToMany(User::class)->using(TourUser::class);
    }
}
