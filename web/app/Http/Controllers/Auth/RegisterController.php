<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin_profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Firstname' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Profile::create([
            'Firstname' => $data['Firstname'],
            'Lastname' => $data['Lastname'],
            'DOB' => $data['DOB'],
            'Gender' => $data['Gender'],
            'Marital_status' => $data['Marital_status'],
            'Email' => $data['Email'],
            'Tel' => $data['Tel'],
            'Job_ID' => $data['Job_ID'],
            'Social_link' => $data['Social_link'],
            'Work_type' => $data['Work_type'],
            'Education' => $data['Education'],
            'Photo' => $data['Photo'],
            'Emergency_Contact' => $data['Emergency_Contact'],
            'Hire_day' => $data['Hire_day'],
            'Nationality' => $data['Nationality'],
            'Data_status' => $data['Data_status'],
            'User_role' => $data['User_role'],
            'password' => Hash::make($data['password']),
            'remember_token' => $data['_token'],
        ]);
    }
}
