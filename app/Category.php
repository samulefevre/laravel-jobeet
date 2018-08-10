<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    private $active_jobs;
    private $more_jobs;

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function getSlugAttribute()
    {
        return str_slug($this->name);
    }

    public function scopeActiveJobs($query){
        return $query->get();
    }

    public function scopeGetWithJobs($query)
    {
        $date = date('Y-m-d H:i:s', time());
        //->where('jobs.expires_at', '>', $date)
        return $query->leftJoin('jobs', 'categories.id', '=', 'jobs.category_id')->select('categories.id', 'categories.name')->where('jobs.expires_at', '>', $date)->groupBy('categories.id')->get();
    }

    public function setActiveJobs($jobs)
    {
        $this->active_jobs = $jobs;
    }
    
    public function getActiveJobsAttribute()
    {
        return $this->active_jobs;
    }

    public function setMoreJobs($jobs)
    {
        $this->more_jobs = $jobs >=  0 ? $jobs : 0;
    }
    
    public function getMoreJobsAttribute()
    {
        return $this->more_jobs;
    }

}
