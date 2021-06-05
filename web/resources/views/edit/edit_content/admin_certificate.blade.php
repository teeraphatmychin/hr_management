@extends('layouts.app')

@section('content')
    <style>
        #addCer:hover , #addCer:focus{
            box-shadow: 0px 0px 10px 0px black;
            border-radius: 100px;
            cursor: pointer;
            transition: all .2s ease-out;
            animation: pulse 5s infinite;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-11" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/certificate.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Certificate</span>
            </div>
            <div class="col-md-1" style="">
                <span>
                    @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin' )
                        <img src="{{ asset('img/icon/plus.png') }}" alt="" style="width: 85px;" onclick="window.location.href = '{{ route('cerAdd') }}'" id="addCer">
                    @elseif( Session::get('authen_type') == 'user' || Session::get('authen_type') == 'head')
                        <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-error-icon.png" alt="" style="width: 85px;" data-toggle="modal" data-target="#error" id="edit_icon" name="editicon">
                    @endif
                </span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 50px 50px;">
            <div class="col-md-12">

                @yield('CerZone')

            </div>
        </div>
    </div>

@endsection