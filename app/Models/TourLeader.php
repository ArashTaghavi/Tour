<?php

namespace App\Models;

use App\EloquentHelpers\HasImage;
use App\Model\Tour;
use Illuminate\Database\Eloquent\Model;


class TourLeader extends Model
{
    use HasImage;
    public $image_path = 'tour-leaders';

    protected $fillable = ['name', 'description', 'profile_image'];


    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

}
