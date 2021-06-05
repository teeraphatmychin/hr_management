@extends('layouts.app')

@section('content')
    {{--check session--}}
    <script> console.log("session status = {{ Session::get('authen_type') }}")</script>


<div class="container" style="vertical-align: middle;height: 100%">
    <div class="row justify-content-center align-items-center" style="    background-color: #eee;padding: 20px 0px;font-size: 20px;">
        <a href="{{ route('timestamp') }}">lINK TO TIMESTAMP MODE</a>
    </div>
    <HR>
    <div class="row justify-content-center align-items-center h-100" style="background-color: white;" >
        
        {{--type your code here--}}
        <div class="col-md-5 col-centered" style="height: 385px;">
            <img src="{{ asset('img/icon/logo2.jpg') }}" class="responsive_img_logo2" alt="" style="margin: 0px auto">
        </div>

        <div class="col-md-7" style="padding: 0px 115px;">

            <section class="h-100">
                <div class="container h-100">
                    <div class="row justify-content-md-center h-100">
                        <div class="card-wrapper">
                            <div class="card fat">
                                <div class="card-body">
                                    <h4 class="card-title">Sign In</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="Email" style="text-align: left">E-mail</label>
                                            <input id="Email" type="text" class="form-control" name="Email" value="teeraphatmychin@gmail.com" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" style="text-align: left">Password
                                                <a href="{{ route('password.request') }}" class="float-right">
                                                    Forgot Password?
                                                </a>
                                            </label>
                                            <input id="password" type="password" class="form-control" name="password" required data-eye value="1234567890">
                                            @if ($errors->has('password'))
                                                <button class="btn btn-danger" style="margin: 0px;width: 100%;margin-top: 10px">Incorrect username or password</button>
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>



                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>

                                        <div class="form-group no-margin">
                                            <button type="submit" class="btn btn-warning btn-block" style="margin: 0px;width: 100%">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
</div>
@endsection
