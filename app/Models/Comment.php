<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['full_name', 'email', 'description'];


    public function scopePending($value)
    {
        return $value->where('approved', 0);
    }

    public function scopeApproved($value)
    {
        return $value->where('approved', 1);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
