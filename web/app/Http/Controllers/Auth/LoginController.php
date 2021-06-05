<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


//    config manual
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     * @throws ValidationException
     */
    public function checkProfile($job,$idMember)
    {
        $user = DB::select(DB::raw("SELECT p.Firstname , p.Lastname , j.Job_name , dm.Depart_name FROM profile p, job j , department dm WHERE  p.Job_ID = j.Job_ID AND j.Depart_ID = dm.Depart_ID AND j.Job_id = '$job' AND p.ID_member = '$idMember'"));
        foreach ($user as $users){
            Session::put('Department', $users->Depart_name);
            Session::put('Job', $users->Job_name);
        }
//        return $user;
    }

    protected function credentials(Request $request)
    {
//        return $request->only($this->username(), 'password');

        if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'User_role' => 'admin'])) {
            // The user is active, not suspended, and exists.
            Session::forget('authen_job_id');
            Session::put('authen_type', 'admin');
            Session::put('authen_job_id', Auth::user()->Job_ID);
            $this->checkProfile(Auth::user()->Job_ID,Auth::user()->ID_member);
            return $request->only($this->username(), 'password');
        }
        else if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'User_role' => 'user'])) {
            Session::forget('authen_job_id');
            Session::put('authen_type', 'user');
            Session::put('authen_job_id', Auth::user()->Job_ID);
            $this->checkProfile(Auth::user()->Job_ID,Auth::user()->ID_member);
            return $request->only($this->username(), 'password');
        }
        else if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'User_role' => 'head'])) {
            Session::forget('authen_job_id');
            Session::put('authen_type', 'head');
            Session::put('authen_job_id', Auth::user()->Job_ID);
            $this->checkProfile(Auth::user()->Job_ID,Auth::user()->ID_member);
            return $request->only($this->username(), 'password');
        }
        else if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'User_role' => 'hr_admin'])) {
            Session::forget('authen_job_id');
            Session::put('authen_type', 'hr_admin');
            Session::put('authen_job_id', Auth::user()->Job_ID);
            $this->checkProfile(Auth::user()->Job_ID,Auth::user()->ID_member);
            return $request->only($this->username(), 'password');
        }
        else{
            return $this->sendFailedLoginResponse($request);
        }

    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
            'password' => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'Email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        Session::forget('authen_type');
        Session::forget('authen_job_id');
        Session::forget('CertificatePic');
        return redirect('/');
    }

//    end config manual


    /**
     * Where to redirect users after login.
     *
     * @var string
     */

//    protected $redirectTo = '/home';
    protected $redirectTo = '/admin_profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
