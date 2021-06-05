<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Profile extends Model implements Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;



    protected $primaryKey = 'ID_member';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_member' ,
        'Firstname' ,
        'Lastname' ,
        'DOB' ,
        'Gender' ,
        'Marital_status' ,
        'Email',
        'Tel' ,
        'Job_ID',
        'Social_link',
        'Work_type',
        'Education',
        'Photo',
        'Emergency_Contact',
        'Hire_day',
        'End_date',
        'Nationality',
        'Data_status',
        'User_role',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function profiletoaddress()
    {
        return $this->hasMany('Address', 'ID_member');
    }

    public function profiletohistorywork()
    {
        return $this->hasMany('History_Work', 'ID_member');
    }

    public function profiletocertificate()
    {
        return $this->hasMany('Certificate', 'ID_member');
    }

    public function profiletoformevidence()
    {
        return $this->hasMany('Forms_Evidence', 'ID_member');
    }

    public function profiletotransection()
    {
        return $this->hasMany('Transection_Peyment', 'ID_member');
    }

    public function profiletostatuswork()
    {
        return $this->hasMany('Status_work', 'ID_member');
    }

    public function profiletojob()
    {
        return $this->hasMany('Job', 'Job_ID');
    }

    public function profile_education()
    {
        return $this->hasMany('Education_history', 'ID_member');
    }

}
