<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\Models\category','category_jobs')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'url';
    }

}
