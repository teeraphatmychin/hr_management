document.getElementById("dropzoneUploadADD").style.display = "none";

var timer;

$('#Nationality').on('keyup', function () {
    //add loading indicator
    // $('#textZoneADD').html("<img src='loading.gif'>");
    clearTimeout(timer);       // clear timer
    timer = setTimeout(pesquisar, 500);
});

$('#Nationality').on('keydown', function () {
    clearTimeout(timer);       // clear timer if user pressed key again
});


//call ajax function when user finished typing
function pesquisar(value) {
    // console.log($('#Name').val() + " " + $('#CertificateFrom').val() + " " + $('#CertificateValue').val());
    // $("#CertificateFrom").show();

    var str = $('#Name').val();
    var fullname = str.split(" ");


    var Nationality = $('#Nationality').val();
    if( Nationality !== "" ){
        document.getElementById("dropzoneUploadADD").style.display = "block";
        document.getElementById("textZoneADD").style.display = "none";
        document.getElementById("ffirstname").value = fullname[0];
        document.getElementById("llastname").value = fullname[1];



        var dataArray={
            Firstname:fullname[0],
            Lastname:fullname[1],
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/addNameFirstBeforePic',
            data: dataArray,
            success: function(data){
                console.log('save data Form Evident success: ' + data);
            }
        });
    }else{
        console.log("Please fill complete again !!");
    }
};


function formAddProfileSubmit() {
    var dataArray={
        Name:$('#Name').val(),
        DOB:$('#Birthday').val(),
        Gender:$('#Gender').val(),
        Marital_status:$('#Marital').val(),
        Email:$('#Email').val(),
        Tel:$('#mobile').val(),
        Job_IDb:$('#Jobb').val(),
        Social_link:$('#Social_link').val(),
        Work_type:$('#Work_type').val(),
        Emergency_Contact:$('#EmergencyContact').val(),
        Nationality:$('#Nationality').val(),
        Data_status:$('#Data_status').val(),
        Userrole:$('#Userrole').val(),
        Book_Account_No:$('#Book_Account_No').val(),
        Hire_day:$('#StartWork').val(),

        Hire_day:$('#StartWork').val(),
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/profileAdd',
        data: dataArray,
        success: function(data){
            console.log('save data Form Evident success: ' + data);
        }
    });
    window.location.href = "/admin_profile";
}