<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function scopeGetActiveJobs($query, $category_id = null)
    {
        $date = date('Y-m-d H:i:s', time());        
        return $query->where('expires_at', '>', $date)->where('category_id', $category_id)->orderBy('expires_at', 'desc')->get();
    }

    public function scopeCountActiveJobs($query, $category_id = null)
    {
        $date = date('Y-m-d H:i:s', time());
        return $query->where('expires_at', '>', $date)->where('category_id', $category_id)->where('is_activated', 1)->get()->count();   
    }

}
