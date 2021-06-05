<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

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

{{--content--}}
<div class="wt5" style="width: 100%;border-left: 0.5px solid #808080;margin-left: 30px;padding: 0px 30px;">
    <div class="row" style="margin-top: 30px">
        <div>
            <span style="vertical-align: middle;line-height: 25px;padding-left: 15px;font-size: 20px;"><span class="dot_green"></span>Activity / Detail / date</span>
            {{--<span><button type="button" class="btn btn-default open-popup" style="    border: 1px solid red;color: red;width: 100px;background-color: white;padding: 10px;border-radius: 15px;margin-left: 10px;" data-toggle="modal" data-target="#profile">Edit</button></span>--}}
        </div>
    </div>
    <div class="row" style="background-color: aliceblue;margin-top: 20px;padding: 20px 15px;">
        {{--no date--}}
        {{--<div class="title" id="NoDate">- ไม่มีกิจกรรม</div>--}}

        <form action="{{ route('calender_editSave', ['idMember' => $idMember ] ) }}" method="post" style="width: 100%;padding: 10px 50px;">
            @csrf
            @foreach($results as $resultss )
                <input type="hidden" value="{{ $resultss->ID_listActivity }}" id="ID_listActivity" name="ID_listActivity">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Activity name</label>
                    <div class="col-9">
                        <input class="form-control" type="text" readonly value="{{ $resultss->Activity_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Objective</label>
                    <div class="col-9">
                        <input class="form-control" type="text" readonly value="{{ $resultss->Objective }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Activity name</label>
                    <div class="col-9">
                        <input class="form-control" type="text" readonly value="{{ $resultss->Activity_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Type</label>
                    <div class="col-9">
                        <input class="form-control" type="text" readonly value="{{ $resultss->Type }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Detail</label>
                    <div class="col-9">
                        <input class="form-control" type="text" readonly value="{{ $resultss->Detail }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Start date</label>
                    <div class="col-9">
                        <input class="form-control" type="date" readonly value="{{ $resultss->Start_date }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">End date</label>
                    <div class="col-9">
                        <input class="form-control" type="date" readonly value="{{ $resultss->End_date }}">
                    </div>
                </div>
            @endforeach

            @if(empty($status))
                <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Status</label>
                        <div class="col-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">สถานะการเข้าร่วม</option>
                                <option value="เข้าร่วม">เข้าร่วม</option>
                                <option value="ไม่เข้าร่วม">ไม่เข้าร่วม</option>
                            </select>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="" class="col-2 col-form-label"></label>
                        <div class="col-9">
                            <button type="submit" class="btn btn-warning" style="width: 100%;">Edit</button>
                        </div>
                </div>
            @else
                @foreach($status as $statuss)
                    <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Status</label>
                            <div class="col-9">
                                <input class="form-control" type="text" readonly value="{{ $statuss->status }}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label"></label>
                        <div class="col-9">
                            <button type="button" class="btn btn-success" style="width: 100%;">กรอกข้อมูลเรียบร้อย</button>
                        </div>
                    </div>
                @endforeach

            @endif
        </form>
    </div>
</div>


{{--script--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/date.js')  }}"></script>
