<?php

namespace App\Models;

use App\EloquentHelpers\HasImage;
use Illuminate\Database\Eloquent\Model;

class HostelRoom extends Model
{
    use HasImage;
    public $image_path = 'hostel-rooms';
    public $image_field_name = 'profile_image';

    protected $fillable = ['floor', 'number', 'profile_image', 'options', 'description', 'bed_count'];

    protected $casts = [
        'options' => 'array'
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    public function images()
    {
        return $this->hasMany(ImageHostelRoom::class);
    }

    public function beds()
    {
        return $this->hasMany(BedHostelRoom::class);
    }


}
