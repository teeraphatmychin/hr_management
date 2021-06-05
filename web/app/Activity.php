<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model 
{

    protected $table = 'activity';
    public $timestamps = false;
    protected $primaryKey = 'Activity_ID';

    public function activity_department_to_activity_status()
    {
        return $this->hasMany('Activity_status', 'ID_listActivity');
    }

}