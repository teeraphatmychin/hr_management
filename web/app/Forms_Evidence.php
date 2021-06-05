<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms_Evidence extends Model
{

    protected $table = 'forms_evidence';
    protected $primaryKey = 'ID_Evidence';
    protected $fillable = [
        'ID_member', 'ID_Evidence', 'Form_evi_upload'
    ];
    public $timestamps = true;

}