@extends('edit.edit_content.admin_certificate')
@section('CerZone')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6" id="form_sentEvident">
                <div class="form-group">
                    <label class="control-label col-sm-5" for="CertificateName" style="margin-left: -30px">
                        <span style="font-size: 20px;">Certificate Name :</span>
                    </label>
                    <div class="row" style="margin: 0px;margin-right: 7px">
                        <input id="CertificateName" type="text" name="CertificateName" class="form-control" style="margin-left: 20px;margin-right: 10px">
                    </div>


                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="CertificateFrom"><span style="font-size: 20px;margin-left: -30px;">Certificate From :</span></label>
                    <div class="col-sm-10" style="padding-left: 25px;max-width: 100% !important;">
                        <textarea class="form-control" rows="5" id="CertificateFrom" name="CertificateFrom"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="CertificateValue"><span style="font-size: 20px;margin-left: -30px;">Certificate Value :</span></label>
                    <div class="col-sm-10" style="padding-left: 25px;max-width: 100% !important;">
                        <input class="form-control" type="number" id="CertificateValue" name="CertificateValue"></input>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-warning" id="formEvidentSubmit" name="formEvidentSubmit" style="width: 100%;margin: 10px 0px;font-size: 20px;" onclick="formEvidentSubmit()">Submit</button>
                </div>

            </div>
            <div class="col-md-6">
                <span style="font-size: 20px;font-weight: bold">Upload Certificate:</span>
                {{--dropzone bootstrap--}}
                <div class="container" style="background-color: #f5f6fa;width: 100%;padding: 20px;border-radius: 15px;margin-top: 15px;">

                    {{--check text zone--}}
                    <div id="textZoneCer" style="text-align: center;font-size: 20px;width: 100%;height: 180px;vertical-align: middle;line-height: 15px;padding: 80px 0px;">
                        <p style="font-size: 20px">โปรดกรอกรายละเอียด Certificate ก่อน</p><p style="font-size: 20px"><code>หน้าอัพโหลดรูปถึงจะแสดง</code></p>
                    </div>

                    {{--upload zone--}}
                    <form id="dropzoneUploadCer" method="POST" action="{{ route('storeImageCer') }}" class="dropzone" id="my-awesome-dropzone" style="border-radius: 10px;">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" required/>
                        </div>
                        <input id="CertificateName2" type="hidden" name="CertificateName2" class="form-control" style="margin-left: 20px;margin-right: 10px">
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
@endsection