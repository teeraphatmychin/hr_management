
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

{{--Calendar--}}
<link rel='stylesheet prefetch' href='{{ asset('css/calender/calender_custom.css') }}'>
<style>
    html,body{
        font-family: 'Kanit', sans-serif;
        overflow-x: hidden;
    }
    .dot_green {
        height: 17px;
        width: 17px;
        background-color: #71d653;
        border-radius: 50%;
        display: inline-block;
        margin-right: 10px;
    }
</style>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>

{{--content--}}
<div class="container" style="margin-top: 30px;">
    <div class="row" style="display: inline-flex;width: 100%">
        <div class="wd5" style="width: 100%">
            <div class="row">
                <div class="panel-body">
                    {!! $holiday->calendar() !!}
                    {{--{{ $calendar->calendar() }}--}}
                </div>
            </div>
        </div>
    </div>
</div>


{{--script--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

{!! $holiday->script() !!}