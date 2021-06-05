<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model 
{

    protected $table = 'department';
    public $timestamps = false;

    public function departtolocation()
    {
        return $this->hasMany('Location', 'Location_ID');
    }

    public function departtoactivity()
    {
        return $this->hasMany('Activity_Department', 'Depart_ID');
    }

    public function departtopm()
    {
        return $this->hasMany('PM_of_each_department', 'Depart_ID');
    }

}