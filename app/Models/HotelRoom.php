<?php

namespace App\Models;

use App\EloquentHelpers\HasImage;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasImage;
    public $image_path = 'hotel-rooms';
    public $image_field_name = 'profile_image';

    protected $fillable = ['floor', 'number', 'bedroom_count','price', 'profile_image', 'options', 'description'];

    protected $casts = [
        'options' => 'array'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function images()
    {
        return $this->hasMany(ImageRoom::class);
    }


}
