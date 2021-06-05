@if (Auth::guest())
@else

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel" id="navbar_web">
        <div class="container-fluid">
            @guest
            @else

            @endguest
            {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
            {{--</button>--}}
            {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            {{--<!-- Left Side Of Navbar -->--}}
            {{--<ul class="navbar-nav mr-auto">--}}

            {{--</ul>--}}

            {{--<!-- Right Side Of Navbar -->--}}
            {{--<ul class="navbar-nav ml-auto">--}}
            {{--<!-- Authentication Links -->--}}
            {{--@guest--}}
            {{--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>--}}
            {{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
            {{--@else--}}
            {{--<li class="nav-item dropdown">--}}
            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
            {{--{{ Auth::user()->Email }} <span class="caret"></span>--}}
            {{--</a>--}}

            {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
            {{--onclick="event.preventDefault();--}}
            {{--document.getElementById('logout-form').submit();">--}}
            {{--{{ __('Logout') }}--}}
            {{--</a>--}}

            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
            {{--@csrf--}}
            {{--</form>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--@endguest--}}
            {{--</ul>--}}
            {{--</div>--}}

            {{--<a class="navbar-brand" href="{{ url('/') }}" style="padding-right: 30px;border-right: 1px solid black">--}}
            {{--<img src="{{ asset('img/icon/home.png') }}" alt="" class="homeicon">--}}
            {{--</a>--}}
            <div class="col-md-6">
                <div style="padding-bottom: 3px;">
                    <span class="topbartext1">{{ Auth::user()->Firstname }} {{ Auth::user()->Lastname }}</span>
                    <button type="button" class="btn btn-default topbarbutton1" style="outline: none;width: 155px !important;">
                        @if( Session::get('authen_type') == 'user' )
                            <span style="color: #39a938;width: 150px !important;text-transform: uppercase">employee</span>
                        @elseif( Session::get('authen_type') == 'admin' )
                            <span style="color: #e22222;width: 150px !important;text-transform: uppercase">administrator</span>
                        @elseif( Session::get('authen_type') == 'head' )
                            <span style="color: #7914dd;width: 150px !important;text-transform: uppercase">supervisor</span>
                        @elseif( Session::get('authen_type') == 'hr_admin' )
                            <span style="color: black;width: 150px !important;text-transform: uppercase">hr admin</span>
                        @endif
                    </button>
                </div>
                <div>
                          <span class="topbartext2">
                              <span style="font-weight: bold" id="Department">Department : </span>
                              <span id="DepartmentID">{{ Session::get('Department') }}</span>
                              <span style="font-weight: bold" id="Job">Job : </span>
                              <span id="JobId">{{ Session::get('Job') }}</span>
                          </span>
                </div>
            </div>
            <div class="col-md-5" style="padding: 0px 25px;padding-left: 290px;">
                {{--<input type="text" name="search" id="search" class="search" placeholder="Search people">--}}
                <button type="button" class="btn button_hover" name="search" id="search_button" style="width: 100%;text-align: left;background-color: white;border-radius: 30px;padding-left: 20px;vertical-align: middle;height: 45px;margin: 0px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
                    <img src="img/icon/magnifying-glass.png" alt="" width="20px" height="20px"><span style="padding-left: 15px;">Search people</span>
                </button>
            </div>

            <div class="col-md-1" style="border-left: 1px solid black;margin: 0px 30px;height: 60px;line-height: 60px;">
                {{--<div class="menu-toggle">--}}
                {{--<img src="{{ asset('../img/icon/down-arrow.png') }}" alt="" style="width: 40px;">--}}
                {{--</div>--}}
                <div class="dropdown">
                    <a href="#menu" id="toggle"><span></span></a>

                    <div id="menu" style="display: inline-flex;">
                        <ul style="padding-right: 15px">
                            <li style="line-height: 30px !important;padding: 20px 0px;"><button type="button" class="btn btn-default trigger" style="border: 1px solid red;color: red;width: 90%;">
                                    @if( Session::get('authen_type') == 'user' )
                                        <span style="color: #39a938;width: 150px !important;text-transform: uppercase;font-weight: bold">employee</span>
                                    @elseif( Session::get('authen_type') == 'admin' )
                                        <span style="color: #e22222;width: 150px !important;text-transform: uppercase;font-weight: bold">administrator</span>
                                    @elseif( Session::get('authen_type') == 'head' )
                                        <span style="color: #7914dd;width: 150px !important;text-transform: uppercase;font-weight: bold">supervisor</span>
                                    @elseif( Session::get('authen_type') == 'hr_admin' )
                                        <span style="color: black;width: 150px !important;text-transform: uppercase;font-weight: bold">hr admin</span>
                                    @endif</button>
                            </li>


                            @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin' )
                            <li style="line-height: 30px !important;"><a href="{{ route('noti') }}"><span><img src="{{ asset('../img/icon/bell.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Notification</a></li>
                            <li style="line-height: 30px !important;"><a href="{{ route('admin_salaryEdit') }}"><span><img src="{{ asset('../img/icon/salary.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>salary edit</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('holiday') }}"><span><img src="{{ asset('../img/icon/holiday.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Holiday Special</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('admin_branchLocation') }}"><span><img src="{{ asset('../img/icon/location.svg') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Branch location</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('admin_certificate') }}"><span><img src="{{ asset('../img/icon/certificate.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Certificate</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('admin_payment') }}"><span><img src="{{ asset('../img/icon/payment.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Payment</a></li>
                            @else
                                <li style="line-height: 30px !important;"><a href="{{ route('holiday') }}"><span><img src="{{ asset('../img/icon/holiday.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Holiday Special</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('admin_branchLocation') }}"><span><img src="{{ asset('../img/icon/location.svg') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Branch location</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('admin_certificate') }}"><span><img src="{{ asset('../img/icon/certificate.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Certificate</a></li>
                                <li style="line-height: 30px !important;"><a href="{{ route('admin_payment') }}"><span><img src="{{ asset('../img/icon/payment.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Payment</a></li>
                            @endif
                        </ul>

                        {{--@if(Session::has('admin'))--}}
                        <ul style="padding-left: 15px;border-left: 1px solid;">
                            <li style="line-height: 30px !important;"><a href="{{ route('admin_profile') }}"><span><img src="{{ asset('../img/icon/user1.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Profile</a></li>
                            <li style="line-height: 30px !important;"><a href="{{ route('admin_workhistory') }}"><span><img src="{{ asset('../img/icon/time.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Work history</a></li>
                            <li style="line-height: 30px !important;"><a href="{{ route('admin_calender') }}"><span><img src="{{ asset('../img/icon/calendar.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Work calendar</a></li>
                            {{--<li style="line-height: 30px !important;"><a href="#about"><span><img src="{{ asset('../img/icon/bell.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Notifications</a></li>--}}
                            <li style="line-height: 30px !important;"><a href="{{ asset('leave') }}"><span><img src="{{ asset('../img/icon/copy.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Leave</a></li>
                            <li style="line-height: 30px !important;"><a href="{{ route('teamlist') }}"><span><img src="{{ asset('../img/icon/followers.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Team</a></li>
                            <li style="line-height: 30px !important;"><a href="{{ route('salary') }}"><span><img src="{{ asset('../img/icon/money.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Salary</a></li>
                            <li style="line-height: 30px !important;"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span><img src="{{ asset('../img/icon/logout.png') }}" alt="" style="width: 25px;margin-right: 15px;"></span>Log out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                        {{--@endif--}}

                    </div>

                </div>
            </div>

        </div>
    </nav>
@endif