<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function scopeGetActiveJobs($query, $category_id = null, $max = null)
    {       
        $query->where('expires_at', '>', Carbon::now())->orderBy('expires_at', 'desc');

        if($max)
        {
            $query->take($max);
        }

        if($category_id)
        {
            $query->where('category_id', $category_id);
        }

        return $query->get();
    }

    public function scopeCountActiveJobs($query, $category_id = null)
    {
        $query->where('expires_at', '>', Carbon::now())->where('category_id', $category_id)->where('is_activated', 1);

        if($category_id)
        {
            $query->where('category_id', $category_id);
        }

        return $query->get()->count();
    }

    public function setExpiresAtValue()
    {
        if(!$this->getExpiresAt())
        {
            $this->expires_at = Carbon::now()->addDays(30);
        }
    }

}
