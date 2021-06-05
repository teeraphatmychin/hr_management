@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/user-add-icon.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Add profile</span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 50px 85px;">
            <div class="col-sm">
                <span style="font-size: 20px;font-weight: bold">Upload Picture Profile:</span>
                {{--dropzone bootstrap--}}
                <div class="container" style="background-color: #f5f6fa;width: 100%;padding: 20px;border-radius: 15px;margin-top: 15px;">

                    {{--check text zone--}}
                    <div id="textZoneADD" style="text-align: center;font-size: 20px;width: 100%;height: 180px;vertical-align: middle;line-height: 15px;padding: 80px 0px;">
                        <p style="font-size: 20px">โปรดกรอกข้อมูล General Information นะคราบ</p><p style="font-size: 20px"><code>หน้าอัพโหลดรูปภาพถึงจะแสดง</code></p>
                    </div>

                    {{--upload zone--}}
                    <form id="dropzoneUploadADD" method="POST" action="{{ route('storeImageAddprofile') }}" class="dropzone" id="my-awesome-dropzone" style="border-radius: 10px;">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" required id="profilepicture"/>
                        </div>
                        <input type="hidden" id="ffirstname" name="ffirstname">
                        <input type="hidden" id="llastname" name="llastname">
                    </form>

                </div>
            </div>
        </div>

        <form action="{{ route('profileAdd') }}" method="POST">
            @csrf
            <div class="row justify-content-center" style="padding: 50px 85px;">
                <div class="col-sm">
                    <div style="font-weight: bold;font-size: 25px;margin-bottom: 7px;border-bottom: 1px solid black">
                        General Information
                    </div>
                    <form style="margin-top: 20px">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="โปรดใส่ชื่อ" value="ธนมงคล แย้มเดช">
                        </div>
                        <div class="form-group">
                            <label for="ฺBirthday">ฺBirthday</label>
                            <input type="date" class="form-control" id="Birthday" name="Birthday" value="1997-03-31">
                        </div>
                        <div class="form-group">
                            <label for="Nationality">Nationality</label>
                            <input type="text" class="form-control" id="Nationality" name="Nationality" value="Thai">
                        </div>
                        <div class="form-group">
                            <label for="Data_status">Data status</label>
                            <input type="text" class="form-control" id="Data_status" name="Data_status" value="ยังทำงานอยู่">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="1234567890">
                        </div>
                        <div class="form-group">
                            <label for="Book_Account_No">Book_Account_No</label>
                            <input type="text" class="form-control" id="Book_Account_No" name="Book_Account_No" value="0938475621">
                        </div>
                        <div class="form-group">
                            <label for="Gender">Gender</label>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option selected disabled="disabled"> -- เลือกเพศ --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Gender">Marital</label>
                            <select class="form-control" id="Marital" name="Marital" required>
                                <option selected disabled="disabled"> -- สถานะการแต่งงาน --</option>
                                <option value="อย่าร้าง">อย่าร้าง</option>
                                <option value="โสด">โสด</option>
                                <option value="แต่งงานแล้ว">แต่งงานแล้ว</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Userrole">User role</label>
                            <select class="form-control" id="Userrole" name="Userrole" required>
                                <option selected disabled="disabled"> -- User role --</option>
                                <option value="user">user</option>
                                <option value="head">head</option>
                                <option value="hr_admin">hr_admin</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm">
                    <div style="font-weight: bold;font-size: 25px;margin-bottom: 7px;border-bottom: 1px solid black">
                        Contact Infomation
                    </div>
                    <form style="margin-top: 20px">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="Email" name="Email" value="tyamdej@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="Social_link">Social link</label>
                            <input type="text" class="form-control" id="Social_link" name="Social_link" value="-">
                        </div>
                        <div class="form-group">
                            <label for="Mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="0968918913">
                        </div>
                        <div class="form-group">
                            <label for="workphone">Work phone</label>
                            <input type="text" class="form-control" id="workphone" name="workphone" value="-">
                        </div>
                        <div class="form-group">
                            <label for="EmergencyContact">Emergency Contact</label>
                            <input type="text" class="form-control" id="EmergencyContact" name="EmergencyContact" value="-">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center" style="padding: 50px 85px;">
                <div class="col-sm">
                    <div style="font-weight: bold;font-size: 25px;margin-bottom: 7px;border-bottom: 1px solid black">
                        Job Information
                    </div>
                    <form style="margin-top: 20px">
                        <div class="form-group">
                            <label for="Department">Department</label>
                            <select class="form-control" id="LocationID" name="LocationID" required>
                                <option selected disabled="disabled"> -- แผนกของบริษัท --</option>
                                @foreach($Depart as $Departs)
                                    <option value="{{ $Departs->Depart_ID }}">{{ $Departs->Depart_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Job">Job</label>
                            <select class="form-control" id="Jobb" name="Jobb" required>
                                <option selected disabled="disabled"> -- งานที่ทำ --</option>
                                @foreach($Job as $Jobs)
                                    <option value="{{ $Jobs->Job_ID }}">{{ $Jobs->Job_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Work_type">Work type</label>
                            <input type="text" class="form-control" id="Work_type" name="Work_type" value="FULLTIME">
                        </div>
                        <div class="form-group">
                            <label for="Age">Start Work</label>
                            <input type="date" class="form-control" id="StartWork" name="StartWork" value="1997-10-11">
                        </div>
                        <div class="form-group">
                            <label for="Age">Location No : </label>
                            <input type="text" class="form-control" id="LocationNo" name="LocationNo" value="หมู่บ้านสวนธน">
                        </div>
                        <div class="form-group">
                            <label for="BuildingName">Building Name : </label>
                            <input type="text" class="form-control" id="BuildingName" name="BuildingName" value="ทานตะวัน 3">
                        </div>
                        <div class="form-group">
                            <label for="floor">Floor : </label>
                            <input type="text" class="form-control" id="Floor" name="Floor" value="2">
                        </div>
                        <div class="form-group">
                            <label for="floor">Alley/Lane : </label>
                            <input type="text" class="form-control" id="Alley" name="Alley" value="ประชาอุทิศ">
                        </div>
                        <div class="form-group">
                            <label for="Subdistrict">Sub district : </label>
                            <input type="text" class="form-control" id="Subdistrict" name="Subdistrict" value="ทุ่งตรุ">
                        </div>
                        <div class="form-group">
                            <label for="District">District : </label>
                            <input type="text" class="form-control" id="District" name="District" value="-">
                        </div>
                        <div class="form-group">
                            <label for="Province">Province : </label>
                            <input type="text" class="form-control" id="Province" name="Province" value="กรุงเทพ">
                        </div>
                        <div class="form-group">
                            <label for="Province">Pastal Code : </label>
                            <input type="text" class="form-control" id="Province" name="Province" value="10140">
                        </div>
                        <div class="form-group">
                            <label for="Tel">Tel : </label>
                            <input type="text" class="form-control" id="Tel" name="Tel" value="024708116">
                        </div>
                        <div class="form-group">
                            <label for="Tex">Tex : </label>
                            <input type="text" class="form-control" id="Tex" name="Tex" value="7">
                        </div>
                    </form>
                </div>
                <div class="col-sm">
                    <div style="font-weight: bold;font-size: 25px;margin-bottom: 7px;border-bottom: 1px solid black">
                        Educations Infomation
                    </div>
                    <form style="margin-top: 20px">
                        <div>
                            Bachelor
                        </div>
                        <div style="margin-top: 20px">
                            <div class="form-group">
                                <label for="Faculty">1. Faculty</label>
                                <input type="text" class="form-control" id="Faculty" name="Faculty" value="Engineering">
                            </div>
                            <div class="form-group">
                                <label for="Department">Department</label>
                                <input type="text" class="form-control" id="Department" name="Department" value="Computer Engineering">
                            </div>
                            <div class="form-group">
                                <label for="From">From</label>
                                <input type="text" class="form-control" id="From" name="From" value="King Mongkut's University of Technology Thonburi">
                            </div>
                            <div class="form-group">
                                <label for="Year">Year</label>
                                <input type="text" class="form-control" id="Year" name="Year" value="2539">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center" style="padding: 50px 85px;">
                <div class="col-sm">
                    <div style="font-weight: bold;font-size: 25px;margin-bottom: 7px;border-bottom: 1px solid black">
                        Work History Information
                    </div>
                    <form style="margin-top: 20px">
                        <div class="form-group">
                            <label for="oldDepartment">1. Department</label>
                            <input type="text" class="form-control" id="oldDepartment" name="oldDepartment" value="Introduction International">
                        </div>
                        <div class="form-group">
                            <label for="oldjob">Job</label>
                            <input type="text" class="form-control" id="oldjob" name="oldjob" value="Bioresources & Environmental Bioly">
                        </div>
                        <div class="form-group">
                            <label for="oldCompany">Company : </label>
                            <input type="text" class="form-control" id="oldCompany" name="oldCompany" value="Apple (TH) Inc.">
                        </div>
                        <div class="form-group">
                            <label for="oldendwork">End Work : </label>
                            <input type="date" class="form-control" id="oldendwork" name="oldendwork" value="1997-11-10">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="button" class="btn btn-primary" onclick="formAddProfileSubmit()" style="width: 40%;font-size: 20px;">ADD PROFILE</button>
            </div>
        </form>
    </div>

    {{--script--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--document.getElementById("dropzoneUpload").style.display = "none";--}}
        {{--});--}}
    {{--</script>--}}

@endsection