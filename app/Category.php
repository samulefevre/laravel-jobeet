<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{
    public $timestamps = false;
    private $active_jobs;    

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function getSlugAttribute()
    {
        return str_slug($this->name);
    }
    
    public function scopeGetWithJobs($query)
    {
        return $query->leftJoin('jobs', 'categories.id', '=', 'jobs.category_id')->select('categories.id', 'categories.name')->where('jobs.expires_at', '>', Carbon::now())->groupBy('categories.id')->get();
    }

    public function setActiveJobs($jobs)
    {
        $this->active_jobs = $jobs;
    }
    
    public function getActiveJobsAttribute()
    {
        return $this->active_jobs;
    }    

}
