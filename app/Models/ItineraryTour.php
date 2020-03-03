<?php

namespace App\Models;

use App\Model\Tour;
use Illuminate\Database\Eloquent\Model;

class ItineraryTour extends Model
{
    protected $fillable = ['title', 'description', 'profile_image'];

    public $image_field_name = 'profile_image';

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

}
