@extends('layouts.app')

@section('content')
    <style>
        #listLocation:hover , #listLocation:focus{
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
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/location.svg') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Branch Location</span>
                <div style="    display: inline-flex;width: 350px;height: 45px;vertical-align: middle;margin: 20px 0px;">
                    {{--<select id="dropdown_location_branchLocation">--}}
                        {{--<option value disabled selected>Select month</option>--}}
                        {{--<option value="january">January</option>--}}
                        {{--<option value="febuary">Febuary</option>--}}
                        {{--<option value="march">March</option>--}}
                    {{--</select>--}}
                    {{--<select id="dropdown_department_branchLocation">--}}
                        {{--<option value disabled selected>Select year</option>--}}
                        {{--<option value="2018">2018</option>--}}
                        {{--<option value="2017">2017</option>--}}
                        {{--<option value="2016">2016</option>--}}
                        {{--<option value="2015">2015</option>--}}
                        {{--<option value="2014">2014</option>--}}
                        {{--<option value="2013">2013</option>--}}
                        {{--<option value="2012">2012</option>--}}
                        {{--<option value="2011">2011</option>--}}
                        {{--<option value="2010">2010</option>--}}
                    {{--</select>--}}
                </div>
            </div>
            <div class="col-md-1">
                <span>
                    @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin' )
                        <img src="{{ asset('img/icon/plus.png') }}" alt="" style="width: 85px;" data-toggle="modal" data-target="#list" id="listLocation">
                    @elseif( Session::get('authen_type') == 'user' || Session::get('authen_type') == 'head')
                        <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-error-icon.png" alt="" style="width: 85px;" data-toggle="modal" data-target="#error" id="edit_icon" name="editicon">
                    @endif
                </span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 50px 50px;">
            <div class="col-md-12">
                <table class="table table-bordered" style="text-align: center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Department Name</th>
                        <th scope="col">Total Job</th>
                        {{--<th scope="col">Control</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brance as $brances)
                        <tr>
                            <td style="vertical-align: middle">{{ $brances->Depart_name }}</td>
                            <td style="vertical-align: middle">{{ $brances->Total_Job }}</td>
                            {{--<td style="vertical-align: middle">--}}
                                {{--<button type="button" class="btn btn-default open-popup" style="border: 1px solid red;color: red;width: 100px;" >Edit</button>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--modal zone--}}
    <div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="display: initial;">
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                        <h4 class="modal-title" id="myModalLabel">Add department</h4>
                    </div>

                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="content_zone" style="text-align: center">
                                    <div style="text-align: left;padding: 20px 0px;">
                                            <div class="form-group">
                                                <label for="exampleInputDepartment">Department name</label>
                                                <input type="text" class="form-control" id="DepartmentName" name="DepartmentName" placeholder="โปรดใส่ชื่อแผนก" required>
                                                <small id="DepartmentName" class="form-text text-muted">โปรดใส่ชื่อแผนกที่คุณต้องการ</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputTel">Tel</label>
                                                <input type="text" class="form-control" id="DepartmentTel" name="DepartmentTel" placeholder="โปรดใส่ชื่อเบอร์โทรศัพท์แผนก" required>
                                                <small id="DepartmentTel" class="form-text text-muted">โปรดใส่เบอร์โทรศัพท์แผนกที่คุณต้องการ</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLocation">Location</label>
                                                <select class="form-control" id="LocationID" name="LocationID" required>
                                                    <option selected disabled="disabled"> -- สถานที่ของบริษัท --</option>
                                                    @foreach($location as $locations)
                                                        <option value="{{ $locations->Location_ID }}">{{ $locations->Location_ID }} - {{ $locations->Location_name  }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="LocationID" class="form-text text-muted">โปรดใส่สถานที่ของบริษัทที่แผนกของคุณ</small>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px">Close</button>
                                <button type="submit" class="btn btn-primary" style="width: 175px" onclick="sentDepart()">Save changes</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    {{--script--}}
    <script>
        function sentDepart() {
            var dataArray={
                DepartmentName:$('#DepartmentName').val(),
                DepartmentTel:$('#DepartmentTel').val(),
                LocationID:$('#LocationID').val()
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/saveDepartment',
                data: dataArray,
                success: function(data){
                    console.log('save data Form Depart success: ' + data);
                }
            });
            $(".modal").removeClass("in");
            $(".modal-backdrop").remove();
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '');
            $(".modal").hide();
            $("#list").modal('hide');
        }

    </script>
@endsection