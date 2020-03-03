<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{

    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $fillable = ['title'];


    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'ASC');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
