<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name') }} - {{ date('Y') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/teamlist.css') }}" rel="stylesheet">
    <link href="{{ asset('css/workhistory.css') }}" rel="stylesheet">
    <link href="{{ asset('css/popup_search.css') }}" rel="stylesheet">


    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <style>
        body{
            background-color: rgba(248, 197, 87,0.2);

        }
    </style>

</head>
<body>
<button type="button" onclick="myFunction()" id="buttonPrint">
    Print PDF with Message
</button>

<div class="container-fluid" style="padding: 10px 30px;font-size: 15px;" id="printZone">
    <div class="row">
        <div class="col-sm">
            <p><div>บริษัท HR48 จำกัด</div></p>
            <p><div>Company HR48 Co.,Ltd.</div></p>
        </div>
        <div class="col-sm" style="text-align: right;">
            <button type="button" class="btn btn-warning" style="background-color: #77777700;border: 2px solid #F8C557;width: 250px;padding: 10px 0px;font-size: 20px;color: #F8C557;line-height: 2;margin: 14px 0px;">ใบแจ้งเงินเดือน / Pay slip</button>
        </div>
    </div>
    <div class="row" style="margin-top: 25px;">
        <div class="col-sm">
            <div class="row">
                <div class="col-sm">รหัสพนักงาน (EMP.NO.)</div>
                <div class="col-sm" style="font-weight: bold">{{ $ID }}</div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm">ชื่อ (NAME)</div>
                <div class="col-sm" style="font-weight: bold">{{ $Firstname }} {{ $Lastname }}</div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm">สังกัด (SECT/DEPT.)</div>
                <div class="col-sm" style="font-weight: bold">{{ $Depart_ID }}</div>
            </div>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="col-sm">ตำแหน่ง (JOB)</div>
                <div class="col-sm" style="font-weight: bold">{{ $Job_ID }}</div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm">ประจำงวด (FOR PERIOD)</div>
                <div class="col-sm" style="font-weight: bold">{{date("Y/m/d")}}</div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm">เลขบัญชี</div>
                <div class="col-sm" style="font-weight: bold">{{ $Book_Account_No }}</div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 20px 15px;">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">
                    <div class="row">
                        <div class="col-sm">รายการได้ (INCOME)</div>
                        <div class="col-sm" style="text-align: right">บาท (Bath)</div>
                    </div>
                </th>
                <th scope="col">
                    <div class="row">
                        <div class="col-sm">รายการหัก (DEDUCTION)</div>
                        <div class="col-sm" style="text-align: right">บาท (Bath)</div>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm">Certificate</div>
                        <div class="col-sm" style="text-align: right">{{ $ttValueSkill }}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm">ขาดงาน (Absent)</div>
                        <div class="col-sm" style="text-align: right">{{ $Absent }} ครั้ง</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm">ค่าล่วงเวลา (Over Time)</div>
                        <div class="col-sm" style="text-align: right">{{ $VOTtotal }}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm">สาย (Late)</div>
                        <div class="col-sm" style="text-align: right">{{ $Late }} ครั้ง</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm">ค่าตำแหน่ง (Position Allowance)</div>
                        <div class="col-sm" style="text-align: right">{{ $Salary }}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm">ลา (Leave)</div>
                        <div class="col-sm" style="text-align: right">{{ $Leave }} ครั้ง</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm">โบนัส (Bonus)</div>
                        <div class="col-sm" style="text-align: right">{{ $Bonus }}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm">ภาษี (Tax)</div>
                        <div class="col-sm" style="text-align: right">7 %</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm">Payment Special</div>
                        <div class="col-sm" style="text-align: right">{{ $payspe }}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm">ประกันสังคม (Social Security Fund)</div>
                        <div class="col-sm" style="text-align: right">{{ $SocialSecurityFund }} บาท</div>
                    </div>
                </td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <th scope="col">
                    <div class="row">
                        <div class="col-sm">รวมรายได้ (TOTAL INCOME)</div>
                        <div class="col-sm" style="text-align: right">{{ $Totalincome }} <span>บาท (Bath)</span></div>
                    </div>
                </th>
                <th scope="col">
                    <div class="row">
                        <div class="col-sm">รวมรายการหัก (TOTAL DEDUCTION)</div>
                        <div class="col-sm" style="text-align: right">{{ $TOTALDEDUCTION }} <span>บาท (Bath)</span></div>
                    </div>
                </th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th scope="col">
                    <div class="row">
                        <div class="col-sm">รายได้สุทธิ (NET INCOME)</div>
                        <div class="col-sm" style="text-align: right">{{ $NETINCOME }} <span>บาท (Bath)</span></div>
                    </div>
                </th>
            </tr>
            </thead>
        </table>
    </div>
</div>

{{--script zone--}}
<script>
    function myFunction() {
        window.print(document.getElementById('buttonPrint').style.visibility = 'hidden');
        // window.print();
    }
</script>

</body>
</html>