<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\Models\category','category_resumes')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'url';
    }
}
