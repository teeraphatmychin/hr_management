@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('../img/icon/holiday.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Holiday Calendar</span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ route('holidayeiei') }}" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    </div>
@endsection

