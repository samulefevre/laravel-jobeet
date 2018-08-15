<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;


class Job extends Model
{
    use Searchable;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getCompanySlugAttribute()
    {
        return str_slug($this->company);
    }

    public function getLocationSlugAttribute()
    {
        return str_slug($this->location);
    }

    public function getPositionSlugAttribute()
    {
        return str_slug($this->position);
    }

    public function scopeGetActiveJobs($query, $category_id = null, $jobs_per_page = null)
    {       
        $query->where('expires_at', '>', Carbon::now())->where('is_activated', 1)->orderBy('expires_at', 'desc');
        
        if($category_id)
        {
            $query->where('category_id', $category_id);
        }

        return $query->paginate($jobs_per_page);
    }

    public function getExpiresAt()
    {
        return $this->expires_at;
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

    public function getToken()
    {
        return $this->token;
    }

    public function setTokenValue()
    {
        if(!$this->getToken())
        {
            $this->token = Password::getRepository()->createNewToken();
        }
    }

}
