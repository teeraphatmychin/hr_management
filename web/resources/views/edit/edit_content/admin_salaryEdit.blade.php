@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/money.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Salary Edit</span>
                <div style="    display: inline-flex;width: 50%;height: 45px;vertical-align: middle;margin: 20px 0px;">
                    {{--<div class="form-group" style="display: inherit;">--}}
                        {{--<label style="width: 100px;font-size: 20px">Location : </label>--}}
                        {{--<input type="text" name="search" class="search" placeholder="Search edit people" style="width: 255px;height: 45px">--}}
                    {{--</div>--}}
                    {{--<select id="dropdown_year_salaryEdit">--}}
                        {{--<option value disabled selected>Select month</option>--}}
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
                    {{--<select id="dropdown_month_salaryEdit">--}}
                        {{--<option value disabled selected>Select date</option>--}}
                        {{--<option value="january">January</option>--}}
                        {{--<option value="febuary">Febuary</option>--}}
                        {{--<option value="march">March</option>--}}
                    {{--</select>--}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 50px 50px;" >
            <div class="col-md-12">
                <table class="table table-bordered" style="text-align: center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Job name</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Ot late</th>
                        <th scope="col">Control</th>
                    </tr>
                    </thead>
                    <tbody id="contentt">
                    @foreach($job_salaray as $job_salarays)
                        <tr>
                            <th scope="row" style="vertical-align: middle">{{ $job_salarays->Job_name }}</th>
                            <td style="vertical-align: middle">{{ $job_salarays->Salary }}</td>
                            <td style="vertical-align: middle">{{ $job_salarays->OT_Rate }}</td>
                            <td style="vertical-align: middle">
                                <button type="button" class="btn btn-default open-popup" style="border: 1px solid red;color: red;width: 100px;" data-id="{{ $job_salarays->Job_name }}" data-toggle="modal" data-target="#list" id="salarayedit">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="display: initial;">

                        <h4 class="modal-title" id="myModalLabel">Add department</h4>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="content_zone" style="text-align: center">
                                <div style="text-align: left;padding: 20px 0px;">
                                    <div class="form-group">
                                        <label for="Jobname">Job name</label>
                                        <input type="text" class="form-control" id="Jobname" name="Jobname" placeholder="โปรดใส่ชื่อแผนก" required readonly>
                                        <small id="Jobname" class="form-text text-muted">ท่านได้เลือก Job นี้</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="Salary">Salary</label>
                                        <input type="text" class="form-control" id="Salary" name="Salary" placeholder="โปรดใส่ชื่อ Salary ที่คุณต้องการปรับ" required>
                                        <small id="Salary" class="form-text text-muted">โปรดใส่ Salary ที่คุณต้องการ</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="OT_Rate">OT Rate</label>
                                        <input type="text" class="form-control" id="OT_Rate" name="OT_Rate" placeholder="โปรดใส่ชื่อ OT Rate ที่คุณต้องการปรับ" required>
                                        <small id="OT_Rate" class="form-text text-muted">โปรดใส่ OT Rate แผนกของคุณ</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px" id="close">Close</button>
                            <button type="submit" class="btn btn-primary" style="width: 175px" onclick="sentSalaryEdit()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--script--}}
    <script>
        $(document).ready(function(){

            $(document).on("click", "table button", function(){
                $("#trigger_modal").trigger("click");
                $("#list .modal-title").html("UPDATE Salary");
                // $("#profile .modal-body").html($("#profile").html());
                $('#list input[id="Jobname"]').val($(this).data("id"));
            });
        });
    </script>
    <script>
        function sentSalaryEdit() {
            var dataArray={
                Jobname:$('#Jobname').val(),
                Salary:$('#Salary').val(),
                OT_Rate:$('#OT_Rate').val()
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/salaryEdit',
                data: dataArray,
                success: function(data){
                    console.log('save data Form SalaryEdit success: ' + data);
                    $( "#close" ).click();
                    $('#list').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    location.reload();
                }
            });
        }
    </script>
@endsection