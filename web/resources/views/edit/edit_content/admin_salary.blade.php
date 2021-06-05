@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/money.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Salary</span>
                <div style="    display: inline-flex;width: 350px;height: 45px;vertical-align: middle;margin: 20px 0px;">
                    {{--<select id="dropdown_month_salary">--}}
                        {{--<option value disabled selected>Select month</option>--}}
                        {{--<option value="january">January</option>--}}
                        {{--<option value="febuary">Febuary</option>--}}
                        {{--<option value="march">March</option>--}}
                    {{--</select>--}}
                    {{--<select id="dropdown_year_salary">--}}
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
        </div>
        <div class="row justify-content-center" style="padding: 50px 50px;">
            <div class="col-md-12">

                <table class="table table-bordered" style="text-align: center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">วันที่จ่ายเงิน</th>
                        <th scope="col">เงินที่ได้จากใบ Certificate</th>
                        <th scope="col">เงินที่ได้การทำ OT</th>
                        <th scope="col">เงิน BONUS</th>
                        <th scope="col">เงืนที่ได้จากการทำงานในวันหยุด</th>
                        <th scope="col">เงินที่โดนหักทั้งหมด</th>
                        <th scope="col">เงินรวมทั้งหมด</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($salary as $salarys)
                    <tr>
                        <th scope="row" style="vertical-align: middle">{{ $salarys->Date_Pay }}</th>
                        <td style="vertical-align: middle">{{ $salarys->Total_Value_Skill }}</td>
                        <td style="vertical-align: middle">{{ $salarys->Value_OT_total }}</td>
                        <td style="vertical-align: middle">{{ $salarys->Value_Bonus_total }}</td>
                        <td style="vertical-align: middle">{{ $salarys->Value_payment_special }}</td>
                        <td style="vertical-align: middle">{{ $salarys->Deduction }}</td>
                        <td style="vertical-align: middle">{{ $salarys->ALL_Total }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection