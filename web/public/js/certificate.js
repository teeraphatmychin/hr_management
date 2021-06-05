document.getElementById("dropzoneUploadCer").style.display = "none";

var timer;

//Start a timer on keyup event
$('#CertificateFrom').on('keyup', function () {
    //add loading indicator
    // $('#textZoneCer').html("<img src='loading.gif'>");
    clearTimeout(timer);       // clear timer
    timer = setTimeout(pesquisar, 500);
});


$('#CertificateFrom').on('keydown', function () {
    clearTimeout(timer);       // clear timer if user pressed key again
});

$('#CertificateName').on('keyup', function () {
    //add loading indicator
    // $('#textZoneCer').html("<img src='loading.gif'>");
    clearTimeout(timer);       // clear timer
    timer = setTimeout(pesquisar, 500);
});


$('#CertificateName').on('keydown', function () {
    clearTimeout(timer);       // clear timer if user pressed key again
});

$('#CertificateValue').on('keyup', function () {
    //add loading indicator
    // $('#textZoneCer').html("<img src='loading.gif'>");
    clearTimeout(timer);       // clear timer
    timer = setTimeout(pesquisar, 500);
});


$('#CertificateValue').on('keydown', function () {
    clearTimeout(timer);       // clear timer if user pressed key again
});

//call ajax function when user finished typing
function pesquisar(value) {
    // console.log($('#CertificateName').val() + " " + $('#CertificateFrom').val() + " " + $('#CertificateValue').val());
    // $("#CertificateFrom").show();
    var date = $('#CertificateName').val();
    var CertificateFrom = $('#CertificateFrom').val();
    var CertificateValue = $('#CertificateValue').val();
    if(date !== "" && CertificateFrom !== "" && CertificateValue !== ""){
        document.getElementById("dropzoneUploadCer").style.display = "block";
        document.getElementById("textZoneCer").style.display = "none";
        document.getElementById("CertificateName2").value = $('#CertificateName').val();
        var dataArray={
            CertificateName:$('#CertificateName').val(),
            CertificateFrom:$('#CertificateFrom').val(),
            CertificateValue:$('#CertificateValue').val()
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/saveFormCer',
            data: dataArray,
            sucess: function(data){
                console.log('save data Form Evident success: ' + data);
            }
        });
    }else{
        console.log("Please fill complete again !!");
    }
};

function formEvidentSubmit() {

    var dataArray={
        CertificateName:$('#CertificateName').val(),
        CertificateFrom:$('#CertificateFrom').val(),
        CertificateValue:$('#CertificateValue').val()
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/saveFormCer',
        data: dataArray,
        success: function(data){
            console.log('save data Form Evident success: ' + data);
        }
    });
    window.location.href = "/admin_profile";

}