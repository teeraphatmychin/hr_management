@extends('layouts.app')

@section('content')
    <style>
        .switch {
            background-color: #47A7DC;
            width: 200px;
            display: inline-block;
            border-radius: 10px;
            height: 40px;
            padding: 2px;
            position: relative;
            zoom: 1;
        }
        .switch:before, .switch:after {
            content: " ";
            /* 1 */
            display: table;
            /* 2 */
        }
        .switch:after {
            clear: both;
        }
        .switch label {
            float: left;
            width: 50%;
            position: relative;
            z-index: 2;
            line-height: 40px;
            cursor: pointer;
            color: #c8e4f4;
            border-radius: 10px;
        }
        .switch input[type="radio"] {
            display: none;
        }
        .switch input[type="radio"]:checked + label {
            color: #007DA6;
            font-weight: bold;
        }
        .switch span {
            position: relative;
            z-index: 1;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            display: block;
            border-radius: 10px;
            background-color: #FFF;
            transition: all 200ms ease;
        }
        .switch span.right {
            left: 50%;
            border-radius: 10px;
            transition: all 200ms ease;
        }

    </style>
    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/bell.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Notifications</span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 0px 50px;">
            <div class="col-md-12">
                {{--<table class="table table-bordered" style="margin-top: 50px;text-align: center">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th class="col-md-1" style="text-align: center">Photo</th>--}}
                        {{--<th class="col-md-2" style="text-align: center">Name</th>--}}
                        {{--<th class="col-md-1" style="text-align: center">Date/time</th>--}}
                        {{--<th class="col-md-5" style="text-align: center">Annotation</th>--}}
                        {{--<th class="col-md-2" style="text-align: center">File</th>--}}
                        {{--<th class="col-md-1" style="text-align: center">Confirm</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tr>--}}
                        {{--<td class="col-md-1" style="text-align: center;vertical-align: middle;"><img src="{{ asset('img/icon/June_2017_BNK48_Nayika_Srinian.jpg') }}" alt="" class="pic_intable"></td>--}}
                        {{--<td class="col-md-2" style="vertical-align: middle;">Ms. NAYIKA SRINIAN</td>--}}
                        {{--<td class="col-md-1" style="vertical-align: middle;"></td>--}}
                        {{--<td class="col-md-5" style="vertical-align: middle;"></td>--}}
                        {{--<td class="col-md-2" style="vertical-align: middle;"></td>--}}
                        {{--<td class="col-md-1" style="vertical-align: middle;">--}}
                            {{--<label class="switch">--}}
                                {{--<input type="checkbox">--}}
                                {{--<span class="slider round"></span>--}}
                            {{--</label>--}}
                            {{--<input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tbody>--}}
                    {{--</tbody>--}}
                {{--</table>--}}

                <table class="table table-bordered" style="margin-top: 50px;text-align: center" id="TableData">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date/time</th>
                        <th scope="col">Annotation</th>
                        <th scope="col">File</th>
                        <th scope="col">Confirm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($formNoti as $formNotis)
                            <input type="hidden" id="idMember" value="{{ $formNotis->ID_member }}">
                            <tr>
                                <th scope="row" style="vertical-align: middle"><img src="{{ asset('img/icon/June_2017_BNK48_Nayika_Srinian.jpg') }}" alt="" class="pic_intable"></th>
                                <td style="vertical-align: middle">{{ $formNotis->Firstname }} {{ $formNotis->Lastname }}</td>
                                <td style="vertical-align: middle">{{ $formNotis->Date }}</td>
                                <td style="vertical-align: middle">{{ $formNotis->Reason }}</td>
                                <td style="vertical-align: middle"><a href="{{ asset('/uploads')."/".$formNotis->Form_evi_upload }}">{{ $formNotis->Form_evi_upload }}</a></td>
                                <td style="vertical-align: middle">
                                    <div class="switch">
                                        <input name="radio" type="radio" value="optionone" id="optionone" checked>
                                        <label for="optionone">ไม่อนุมัติ</label>

                                        <input name="radio" type="radio" value="optiontwo" id="optiontwo">
                                        <label for="optiontwo" class="right">อนุมัติ</label>

                                        <span aria-hidden="true"></span>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        $('.switch label').on('click', function(){
            var indicator = $(this).parent('.switch').find('span');
            if ( $(this).hasClass('right') ){
                $(indicator).addClass('right');
                console.log("อนุ");

                var dataArray={
                    idMember:$('#idMember').val(),
                    Date:$(this).closest("tr").find("td:nth-child(3)").text(),
                    ConfirmFE:"อนุมัติ",
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/sameNotiCon',
                    data: dataArray,
                    success: function(data){
                        console.log('save data Form Evident success: ' + data);
                    }
                });

            } else {
                console.log("ไม่");
                $(indicator).removeClass('right');
            }
            window.location.href = '/admin_notifications';
        });
    </script>
@endsection