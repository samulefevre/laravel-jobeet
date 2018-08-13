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

    public function scopeGetActiveJobs($query, $category_id = null, $max = null, $offset = null)
    {       
        $query->where('expires_at', '>', Carbon::now())->orderBy('expires_at', 'desc');

        if($max)
        {
            $query->take($max);
        }

        if($offset)
        {
            $query->offset($offset);
        }

        if($category_id)
        {
            $query->where('category_id', $category_id);
        }

        return $query->get();
    }

    public function scopeCountActiveJobs($query, $category_id = null)
    {
        $query->where('expires_at', '>', Carbon::now())->where('is_activated', 1);

        if($category_id)
        {
            $query->where('category_id', $category_id);
        }

        return $query->count();
    }

    public function setExpiresAtValue()
    {
        if(!$this->getExpiresAt())
        {
            $this->expires_at = Carbon::now()->addDays(30);
        }
    }

    public static function getTypesAttribute()
    {
        return array('full-time' => 'Full time', 'part-time' => 'Part time', 'freelance' => 'Freelance');
    }

    public static function getTypeValues()
    {
        return array_keys(self::getTypes());
    }    

}
