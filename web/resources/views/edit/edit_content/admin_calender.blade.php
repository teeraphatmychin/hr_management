@extends('edit.edit_main')
@section('edit')

    <div class="row justify-content-center" style="padding: 0px 50px;">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ route('calender') }}"></iframe>
        </div>
    </div>
@endsection