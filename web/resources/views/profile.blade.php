@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/profile.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Profile</span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 60px 20px;">
            @foreach($profile as $profiles)
            <div class="col-md-4">
                <div class="img-picture-profile" style="text-align: center">
                    @if($profiles->Photo == "" || $profiles->Photo == "-")
                        <img src="{{ asset('../img/icon/June_2017_BNK48_Nayika_Srinian.jpg') }}" alt="">
                    @else
                        <img src="{{ asset('/User_Profile/'.$profiles->Photo) }}" alt="">

                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div>
                    <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                        General information
                    </div>
                    <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;">
                        <div>
                            <span style="font-weight: bold">Name :</span> <span>{{ $profiles->Firstname }} {{ $profiles->Lastname }}</span>
                            <span style="padding-left: 40px;font-weight: bold">Birthday :</span> <span>{{ $profiles->DOB }}</span>
                            <span style="padding-left: 40px;font-weight: bold">Age :</span> <span>26</span>
                        </div>
                        <div>
                            <span style="font-weight: bold">Gender :</span> <span>{{ $profiles->Gender }}</span>
                            <span style="padding-left: 40px;font-weight: bold">Marital :</span> <span>{{ $profiles->Marital_status }}</span>
                        </div>

                    </div>
                </div>

                <div style="margin-top: 70px">
                    <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                        Contact information
                    </div>
                    <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;">
                        <div>
                            <span style="font-weight: bold">E-mail :</span> <span>{{ $profiles->Email }}</span>
                            <span style="padding-left: 40px;font-weight: bold">Mobile :</span> <span>{{ $profiles->Tel }}</span>

                        </div>
                        <div>
                            <span style="font-weight: bold">Work Phone :</span> <span>{{ $Workphone }}</span>
                            <span style="padding-left: 40px;font-weight: bold">Emergency Contact :</span> <span>{{ $profiles->Emergency_Contact }}</span>
                        </div>

                    </div>
                </div>
            @endforeach
                <div style="margin-top: 70px">
                    <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                        Job information
                    </div>
                    <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;">
                        <div>
                            <span style="font-weight: bold">Department :</span> <span>{{ $depart }}</span>
                        </div>
                        <div>
                            <span style="font-weight: bold">Job :</span> <span>{{ $job }}</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection