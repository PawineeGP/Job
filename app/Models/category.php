<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function jobs()
    {
    	return $this->belongsToMany('App\Models\job','category_job')->orderBy('created_at','DESC')->paginate(20);
    }

    public function Userjobs()
    {
    	return $this->belongsToMany('App\Models\user_job','category_user_job')->orderBy('created_at','DESC')->paginate(20);
    }

    public function resumes()
    {
    	return $this->belongsToMany('App\Models\resume','category_resume')->orderBy('created_at','DESC')->paginate(20);
    }

    public function getRouteKeyName()
    {
    	return 'url';
    }

}
