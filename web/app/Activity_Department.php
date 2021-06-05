<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity_Department extends Model 
{

    protected $table = 'activity_department';
    public $timestamps = false;

    public function activitydeparttoactivity()
    {
        return $this->hasMany('Activity', 'Activity_ID');
    }

}