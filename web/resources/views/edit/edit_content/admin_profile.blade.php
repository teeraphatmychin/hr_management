@extends('edit.edit_main')
@section('edit')

    <div class="row justify-content-center" style="padding: 0px 50px;">
        <div class="col-md-12">

            <div class="row justify-content-center" style="padding: 60px 20px;margin: 0px;">

                <div class="col-md-3">
                    <div class="img-picture-profile" style="text-align: center">
                        <img src="{{ asset('../img/icon/June_2017_BNK48_Nayika_Srinian.jpg') }}" alt="">
                    </div>

                    @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin')
                        <div style="text-align: center;padding: 30px 0px;">
                            {{--onclick="location.href = '#popup-article';"--}}
                            <button type="button" class="btn btn-default open-popup" style="border: 1px solid red;color: red;width: 100px;" data-toggle="modal" data-target="#profile" id="edit">Edit</button>
                        </div>
                    @endif

                </div>

                <div class="col-md-9">
                    <div>
                        <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                            General information
                        </div>
                        <div style="display: inline-flex;">
                            <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;width: 630px;">
                                @foreach($profile as $profiles)

                                <div>
                                    <span style="font-weight: bold">Name :</span> <span>{{ $profiles->Firstname }} {{ $profiles->Lastname }}</span>
                                    <span style="padding-left: 40px;font-weight: bold">Birthday :</span> <span>{{ $profiles->DOB }}</span>
                                    <span style="padding-left: 40px;font-weight: bold">Age :</span> <span id="age"></span>
                                </div>
                                <div>
                                    <span style="font-weight: bold">Gender :</span> <span>{{ $profiles->Gender }}</span>
                                    <span style="padding-left: 40px;font-weight: bold">Marital :</span> <span>{{ $profiles->Marital_status }}</span>

                                </div>
                                @endforeach
                            </div>
                            @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin')
                            <div style="line-height: 80px;vertical-align: middle;padding-left: 60px;">
                                <button type="button" class="btn btn-default trigger" style="border: 1px solid red;color: red;width: 100px;" data-toggle="modal" data-target="#General_information" id="Edit">Edit</button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div style="margin-top: 70px">
                        <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                            Contact information
                        </div>
                        <div style="display: inline-flex;">
                            <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;width: 630px;">
                                @foreach($profile as $profiles)
                                <div>
                                    <span style="font-weight: bold">E-mail :</span> <span>{{ $profiles->Email }}</span>
                                    <span style="padding-left: 40px;font-weight: bold">Mobile :</span> <span>{{ $profiles->Tel }}</span>

                                </div>
                                <div>
                                    <span style="font-weight: bold">Work Phone :</span> <span>02-1234567</span>
                                    <span style="padding-left: 40px;font-weight: bold">Emergency Contact :</span> <span>{{ $profiles->Emergency_Contact }}</span>
                                </div>
                                @endforeach
                            </div>
                            @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin')
                            <div style="line-height: 80px;vertical-align: middle;padding-left: 60px;">
                                <button type="button" class="btn btn-default" style="border: 1px solid red;color: red;width: 100px;" data-toggle="modal" data-target="#Contact_information" id="Edit">Edit</button>
                            </div>
                            @endif
                        </div>

                    </div>

                    <div style="margin-top: 70px">
                        <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                            Job information
                        </div>
                        <div style="display: inline-flex;">
                            <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;width: 630px;">
                                @foreach($jobinfo as $jobinfos)

                                <div>
                                    <span style="font-weight: bold">Department :</span> <span>{{ $jobinfos->Depart_name }}</span>
                                    <span style="font-weight: bold">Job :</span> <span>{{ $jobinfos->Job_name }}</span>
                                </div>
                                <div>
                                    <span style="font-weight: bold">Start Work :</span> <span>{{ $jobinfos->Hire_day }}</span>
                                    <span style="font-weight: bold">Location No :</span> <span>{{ $jobinfos->Location_name }}</span>
                                    <span style="font-weight: bold">Building Name :</span> <span>{{ $jobinfos->Building }}</span>
                                    <span style="font-weight: bold">Floor :</span> <span>{{ $jobinfos->Floor }}</span>
                                    <span style="font-weight: bold">Alley/Lane :</span> <span>{{ $jobinfos->Alley_Lane }}</span>
                                    <span style="font-weight: bold">Street :</span> <span>{{ $jobinfos->Street }}</span>
                                    <span style="font-weight: bold">Sub district :</span> <span>{{ $jobinfos->Sub_district_Sub_area }}</span>
                                    <span style="font-weight: bold">District :</span> <span>{{ $jobinfos->District_Area }}</span>
                                </div>
                                <div>
                                    <span style="font-weight: bold">Province :</span> <span>{{ $jobinfos->Province }}</span>
                                    <span style="font-weight: bold">Pastal Code :</span> <span>{{ $jobinfos->Postal_Code }}</span>
                                </div>
                                <div>
                                    <span style="font-weight: bold">Tel :</span> <span>{{ $jobinfos->Tel }}</span>
                                    <span style="font-weight: bold">Tex :</span> <span>{{ $jobinfos->Tax }}</span>
                                </div>
                                @endforeach
                            </div>
                            @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin')
                            <div style="line-height: 80px;vertical-align: middle;padding-left: 60px;">
                                <button type="button" class="btn btn-default" style="border: 1px solid red;color: red;width: 100px;" data-toggle="modal" data-target="#Contact_information" id="Edit">Edit</button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div style="margin-top: 70px">
                        <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                            Education information
                        </div>
                        <div style="display: inline-flex;">
                            <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;width: 630px;">
                                @foreach($eduhist as $eduhiss)
                                    <div>
                                        <span style="font-weight: bold">{{ $eduhiss->Degree }}</span>
                                    </div>
                                    <div>
                                        <span style="padding-left: 100px;font-weight: bold">{{ $eduhiss->ID_Education }}. Faculty :</span>
                                        <span>{{ $eduhiss->Faculty }}</span>
                                        <span style="font-weight: bold">Department :</span>
                                        <span>{{ $eduhiss->Department }}</span>
                                        <div>
                                            <span style="padding-left: 116px;font-weight: bold">From :</span>
                                            <span>{{ $eduhiss->Academy }}</span>
                                            <div>
                                                <span style="padding-left: 116px;font-weight: bold">Year :</span>
                                                <span>{{ $eduhiss->Year }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin')
                                <div style="line-height: 80px;vertical-align: middle;padding-left: 60px;">
                                    <button type="button" class="btn btn-default" style="border: 1px solid red;color: red;width: 100px;" data-toggle="modal" data-target="#Contact_information" id="Edit">Edit</button>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div style="margin-top: 70px">
                            <div style="border-bottom: 1px solid black;font-size: 30px;font-weight: bold;">
                                Work History information
                            </div>
                            <div style="display: inline-flex;">
                                <div style="padding-top: 15px;font-size: 18px;line-height: 1.8;width: 630px;">
                                    @foreach($hstwork as $hstworks)
                                    <div>
                                        <span style="font-weight: bold">{{ $hstworks->HW_ID }}. Department :</span> <span>{{ $hstworks->Department }}</span> <span style="font-weight: bold">Job :</span> <span>{{ $hstworks->Job }}</span>
                                        <div><span style="padding-left: 16px;font-weight: bold">Company :</span> <span>{{ $hstworks->Company }}</span> <span style="padding-left: 16px;font-weight: bold">End Work :</span> <span>{{ $hstworks->EndWork }}</span></div>
                                    </div>
                                    @endforeach
                                    @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin')
                                    <div style="line-height: 80px;vertical-align: middle;padding-left: 60px;">
                                        <button type="button" class="btn btn-default" style="border: 1px solid red;color: red;width: 100px;" data-toggle="modal" data-target="#Contact_information" id="Edit">Edit</button>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            {{--modal--}}
            <div class="modal fade" id="General_information" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="vertical-alignment-helper">
                    <div class="modal-dialog vertical-align-center">
                        <div class="modal-content">
                            <div class="modal-header" style="display: initial;">
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                <h4 class="modal-title" id="myModalLabel">General information</h4>
                            </div>


                                <div class="modal-body">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Firstname </label>
                                            <input type="text" name="Firstname" class="form-control" id="Firstname" required autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Lastname </label>
                                            <input type="text" name="Lastname" class="form-control" id="Lastname" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Birthday </label>
                                            <input type="date"  name="Birthday" class="form-control" id="Birthday" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Gender </label>
                                            <select class="form-control" id="Gender" name="Gender" required>
                                                <option selected disabled="disabled"> -- เลือกเพศ --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>                                        </div>
                                        <div class="form-group">
                                            <label>Marital </label>
                                            <input type="text" name="Marital" class="form-control" id="Marital" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px">Close</button>
                                        <button type="submit" class="btn btn-primary" style="width: 175px" onclick="savePROFILE()">Save changes</button>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="modal fade" id="Contact_information" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">--}}
                {{--<div class="vertical-alignment-helper">--}}
                    {{--<div class="modal-dialog vertical-align-center">--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header" style="display: initial;">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                {{--<h4 class="modal-title" id="myModalLabel">Contact information</h4>--}}
                            {{--</div>--}}

                            {{--<form action="" method="POST">--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>E-mail </label>--}}
                                            {{--<input type="email" name="E-mail" class="form-control">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Mobile </label>--}}
                                            {{--<input type="text" name="Mobile" class="form-control" >--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Work Phone </label>--}}
                                            {{--<input type="text" name="Work Phone" class="form-control">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Emergency Contact </label>--}}
                                            {{--<input type="text" name="Emergency Contact" class="form-control">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px">Close</button>--}}
                                        {{--<button type="submit" class="btn btn-primary" style="width: 175px">Save changes</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal fade" id="Job_information" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">--}}
                {{--<div class="vertical-alignment-helper">--}}
                    {{--<div class="modal-dialog vertical-align-center">--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header" style="display: initial;">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                {{--<h4 class="modal-title" id="myModalLabel">Job information</h4>--}}
                            {{--</div>--}}

                            {{--<form action="" method="POST">--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Department </label>--}}
                                            {{--<input type="text" name="Department" class="form-control">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Job </label>--}}
                                            {{--<input type="text" name="Job" class="form-control" >--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px">Close</button>--}}
                                        {{--<button type="submit" class="btn btn-primary" style="width: 175px">Save changes</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">--}}
                {{--<div class="vertical-alignment-helper">--}}
                    {{--<div class="modal-dialog vertical-align-center">--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header" style="display: initial;">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                {{--<h4 class="modal-title" id="myModalLabel">Profile photo</h4>--}}
                            {{--</div>--}}

                            {{--<form action="" method="POST">--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Department </label>--}}
                                            {{--<input type="text" name="Department" class="form-control">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px">Close</button>--}}
                                        {{--<button type="submit" class="btn btn-primary" style="width: 175px">Save changes</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

    {{--script--}}
            <script>
                function savePROFILE() {
                    var dataArray={
                        id:'{{ Auth::user()->ID_member  }}',
                        Firstname:$('#Firstname').val(),
                        Lastname:$('#Lastname').val(),
                        Birthday:$('#Birthday').val(),
                        Gender:$('#Gender').val(),
                        Marital:$('#Marital').val()
                    };
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/editProfile',
                        data: dataArray,
                        sucess: function(data){
                            console.log('save data Form Admin Profle success: ' + data);
                        }
                    });
                    window.location.href = '/'
                }
                function calculateAge(birthday) { // birthday is a date
                    console.log(birthday);
                    var d = new Date(birthday);;
                    var ageDifMs = Date.now() - d.getTime();
                    var ageDate = new Date(ageDifMs); // miliseconds from epoch
                    return Math.abs(ageDate.getUTCFullYear() - 1970);
                }
                $(document).ready(function () {
                    document.getElementById("age").innerHTML = calculateAge('{{ $DOB }}');
                });
            </script>
@endsection
