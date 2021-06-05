@extends('edit.edit_content.admin_certificate')
@section('CerZone')
    {{--ID_Certificate--}}
    <div class="row">
        <div class="col-sm">
            <div class="showMenu" style="overflow-y: auto;height: 500px;">
                @foreach($listCertificate as $listCertificates)
                    <button type="button" class="btn btn-light" style="width: 100%;text-align: left;padding: 20px 15px;border: 0.5px solid black;margin: 10px 0px" onmouseover="IDCer({{ $listCertificates->ID_Certificate }})">
                        <div style="font-weight: bold;font-size: 23px">{{ $listCertificates->Certificate_name }}</div>
                        <div style="font-size: 17px">{{ $listCertificates->Certificate_from }}</div>
                    </button>
                @endforeach
            </div>
        </div>
        <div class="col-sm" style="border-left-style: solid;border-left-color: #ffc439;">
            <div id="picZoneCer" style="position: relative;top: 25%;">
                @if( Session::get('CertificatePic') == "" )
                    <div style="font-size: 20px;background-color: #f5f6fa;height: 500px;border-radius: 5px;padding: 35px;text-align: center;" id="textShow">
                        <div style="vertical-align: middle;position: relative;top: 50%;display: grid;">คลิกที่รายการก่อนนะครับ <code>รูปถึงจะแสดง</code></div>
                    </div>
                @else
                    <img src="{{Session::get('CertificatePic')}}" alt="" style="width: 100%;height: 100%;border-radius: 7px;position: relative;top: 50%;">
                @endif
            </div>
        </div>
    </div>
    {{--script--}}
    <script>
        function IDCer($id) {
            // console.log("enter loop " + $id);

            var dataArray={
                ID_Certificate:$id,
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: '/showPicCer',
                data: dataArray,
                sucess: function(data){
                    // document.getElementById("msg").html(data.msg);
                    console.log('save data Form Evident success: ' + data);
                    // console.log("asdadad");
                },
                error:function(){
                    window.error = "notShow";
                    // console.log("error!!!!");
                }
            });

            if(window.error != "notShow"){
                $( "#picZoneCer" ).load(window.location.href + " #picZoneCer" );
            }

        }
    </script>
@endsection