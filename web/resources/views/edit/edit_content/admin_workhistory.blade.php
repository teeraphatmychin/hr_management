@extends('edit.edit_main')
@section('edit')
    <div class="row justify-content-center" style="padding: 0px 50px;">
        <div class="col-md-12" style="padding: 20px 0px;">
            <div style="display: inline-flex;width: 100%">
            </div>
            <div style="padding: 30px 10px;">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status Work</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Over Time Check in</th>
                        <th>Over Time Check out</th>
                        <th>OT hours</th>
                        @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin' )
                        <th>Edit</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($adwork as $adworks)
                        <tr>
                            <td>{{ $adworks->Work_Date }}</td>
                            <td>{{ $adworks->Status_Work }}</td>
                            <td>{{ $adworks->Time_CheckIn }}</td>
                            <td>{{ $adworks->Time_CheckOut }}</td>
                            <td>{{ $adworks->OT_Time_CheckIn }}</td>
                            <td>{{ $adworks->OT_Time_CheckOut }}</td>
                            <td>{{ $adworks->Over_Time }}</td>
                            @if( Session::get('authen_type') == 'admin' || Session::get('authen_type') == 'hr_admin' )
                            <td>
                                <div style="line-height: 80px;vertical-align: middle">
                                    <button type="button" class="btn btn-default" style="border: 1px solid red;color: red;width: 100px;" data-id="{{ $adworks->Work_Date }}" data-toggle="modal" data-target="#adworks">Edit</button>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{--modal--}}
    <div class="modal fade" id="adworks" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
                                        <label for="Work_Date">Work Date</label>
                                        <input type="date" class="form-control" id="Work_Date" name="Work_Date" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status_Work">Status Work</label>
                                        <select class="form-control" id="Status_Work" name="Status_Work" required>
                                            <option selected disabled="disabled"> -- Status_Work --</option>
                                            <option value="OnTime">OnTime</option>
                                            <option value="Late">Late</option>
                                            <option value="Missing">Missing</option>
                                            <option value="Leave">Leave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 100px" id="close">Close</button>
                            <button type="submit" class="btn btn-primary" style="width: 175px" onclick="sentworkhistory()">Save changes</button>
                            <button type="submit" class="btn btn-primary" style="width: 175px" onclick="sentworkhistorydelete()">Delete</button>
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
                $("#adworks .modal-title").html("UPDATE WORK HOSTORY");
                // $("#profile .modal-body").html($("#profile").html());
                $('#adworks input[id="Work_Date"]').val($(this).data("id"));
            });
        });
    </script>
    <script>
        function sentworkhistory() {
            console.log($('#Work_Date').val());
            var dataArray={
                Work_Date:$('#Work_Date').val(),
                Status_Work:$('#Status_Work').val(),
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/workedit',
                data: dataArray,
                success: function(data){
                    console.log('save data Form workstatus success: ' + data);
                    $( "#close" ).click();
                    $('#adworks').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    location.reload();
                }
            });
        }

        function sentworkhistorydelete() {
            var dataArray={
                Work_Date:$('#Work_Date').val(),
                Status_Work:$('#Status_Work').val(),
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/workdelete',
                data: dataArray,
                success: function(data){
                    console.log('save data Form workstatus success: ' + data);
                    $( "#close" ).click();
                    $('#adworks').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    location.reload();
                }
            });
        }
    </script>

@endsection