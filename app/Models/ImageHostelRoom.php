<?php

namespace App\Models;

use App\EloquentHelpers\HasImage;
use Illuminate\Database\Eloquent\Model;

class ImageHostelRoom extends Model
{
    use HasImage;

    protected $fillable = ['profile_image'];


    public $image_path = 'image-hostel-room';
    public $image_field_name = 'profile_image';

    public function hotel()
    {
        return $this->belongsTo(HostelRoom::class);
    }
}
