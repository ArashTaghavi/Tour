<?php

namespace App\Models;

use App\EloquentHelpers\HasImage;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Hostel extends Model
{
    protected $guarded = ['id'];

    use HasSlug;
    use HasImage;
    public $image_path = 'hostels';
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

    public function images()
    {
        return $this->hasMany(HostelImage::class);
    }

    public function rooms()
    {
        return $this->hasMany(HostelRoom::class);
    }

    protected $casts = [
        'options' => 'array',
        'policies' => 'array',
    ];


    /*
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
        }*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
