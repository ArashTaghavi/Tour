<?php

namespace App\Models;

use App\EloquentHelpers\HasImage;
use Illuminate\Database\Eloquent\Model;

class HostelImage extends Model
{
    use HasImage;

    protected $fillable = ['profile_image'];


    public $image_path = 'hostel-image';
    public $image_field_name = 'profile_image';

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
