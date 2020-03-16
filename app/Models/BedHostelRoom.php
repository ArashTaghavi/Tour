<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BedHostelRoom extends Model
{


    protected $fillable = ['number','price','persons','discount','start_date','end_date'];



    public function room()
    {
        return $this->belongsTo(HostelRoom::class);
    }




}
