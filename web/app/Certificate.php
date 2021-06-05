<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model 
{

    protected $primaryKey = 'NoCertificate';
    protected $table = 'certificate';
    public $timestamps = false;

    public function certificatetovalueoec()
    {
        return $this->hasMany('Value_of_Each_Certificate', 'ID_Certificate');
    }

}