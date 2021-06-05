@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('img/icon/copy.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Leave</span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 50px 85px;">
                <div class="col-md-6" id="form_sentEvident">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email" style="margin-left: -30px">
                            <span style="font-size: 20px;">Date:</span>
                        </label>
                        <div class="row" style="margin: 0px;margin-right: 7px">
                            <input id="dateEvident" type="date" min="{{ date('Y-m-d', strtotime('+1 day')) }}" name="dateEvident" class="form-control" style="margin-left: 20px;margin-right: 10px">
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Annotation"><span style="font-size: 20px;margin-left: -30px;">Annotation:</span></label>
                        <div class="col-sm-10" style="padding-left: 25px;max-width: 100% !important;">
                            <textarea class="form-control" rows="5" id="Annotation" name="Annotation"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-warning" id="formEvidentSubmit" name="formEvidentSubmit" style="width: 100%;margin: 10px 0px;font-size: 20px;" onclick="formEvidentSubmit()">Submit</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <span style="font-size: 20px;font-weight: bold">Upload evidence:</span>
                    {{--dropzone bootstrap--}}
                    <div class="container" style="background-color: #f5f6fa;width: 100%;padding: 20px;border-radius: 15px;margin-top: 15px;">

                        {{--check text zone--}}
                        <div id="textZone" style="text-align: center;font-size: 20px;width: 100%;height: 180px;vertical-align: middle;line-height: 15px;padding: 80px 0px;">
                            <p style="font-size: 20px">โปรดกรอกวันที่และเหตุผลในการลาก่อน</p><p style="font-size: 20px"><code>หน้าอัพโหลดเอกสารถึงจะแสดง</code></p>
                        </div>

                        {{--upload zone--}}
                        <form id="dropzoneUpload" method="POST" action="{{ route('storeImage') }}" class="dropzone" id="my-awesome-dropzone" style="border-radius: 10px;">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" required id="fileLeave"/>
                            </div>
                            <input id="dateEvident2" type="hidden" name="dateEvident2" class="form-control" style="margin-left: 20px;margin-right: 10px">
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection