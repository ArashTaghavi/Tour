<?php

namespace App\Model;

use App\EloquentHelpers\HasImage;
use App\Models\ImageTour;
use App\Models\ItineraryTour;
use App\Models\PeriodTour;
use App\Models\TourLeader;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tour extends Model
{
    protected $guarded = ['id'];

    use HasSlug;
    use HasImage;
    public $image_path = 'tours';
    public $image_field_name = 'profile_image';

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
        'trips' => 'array',
        'travel_style' => 'array',
        'transportation' => 'array'
    ];

    public function images()
    {
        return $this->hasMany(ImageTour::class);
    }


    public function itineraryTour()
    {
        return $this->hasMany(ItineraryTour::class);
    }


    public function periods()
    {
        return $this->hasMany(PeriodTour::class);
    }

    public function tourLeader()
    {
        return $this->belongsTo(TourLeader::class);
    }
}
