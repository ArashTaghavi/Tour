<?php

namespace App\Models;

use App\Model\Tour;
use Illuminate\Database\Eloquent\Model;
use App\EloquentHelpers\HasImage;

class ImageTour extends Model
{
    use HasImage;

    protected $fillable = ['title', 'description', 'profile_image', 'main_gallery'];
    protected $casts = ['main_gallery' => 'boolean'];


    public $image_path = 'image-tour';

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
