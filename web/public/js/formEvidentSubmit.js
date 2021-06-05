document.getElementById("dropzoneUpload").style.display = "none";

var timer;

//Start a timer on keyup event
$('#Annotation').on('keyup', function () {
    //add loading indicator
    // $('#textZone').html("<img src='loading.gif'>");
    clearTimeout(timer);       // clear timer
    timer = setTimeout(pesquisar, 500);
});


$('#Annotation').on('keydown', function () {
    clearTimeout(timer);       // clear timer if user pressed key again
});

$('#dateEvident').on('keyup', function () {
    //add loading indicator
    // $('#textZone').html("<img src='loading.gif'>");
    clearTimeout(timer);       // clear timer
    timer = setTimeout(pesquisar, 500);
});


$('#dateEvident').on('keydown', function () {
    clearTimeout(timer);       // clear timer if user pressed key again
});

//call ajax function when user finished typing
function pesquisar(value) {
    // console.log("sdsdsd");
    // $("#Annotation").show();
    var date = $('#dateEvident').val();
    var Annotation = $('#Annotation').val();
    if(date !== "" && Annotation !== ""){
        document.getElementById("dropzoneUpload").style.display = "block";
        document.getElementById("textZone").style.display = "none";
        document.getElementById("dateEvident2").value = $('#dateEvident').val();
        var dataArray={
            date:$('#dateEvident').val(),
            reason:$('#Annotation').val()
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/saveFormEv',
            data: dataArray,
            success: function(data){
                console.log('save data Form Evident success: ' + data);
            }
        });
    }else{
        console.log("Please fill complete again !!");
    }
};

function formEvidentSubmit() {

        var dataArray={
            date:$('#dateEvident').val(),
            reason:$('#Annotation').val()
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/saveFormEv',
            data: dataArray,
            success: function(data){
                console.log('save data Form Evident success: ' + data);
            }
        });
        window.location.href = "/admin_profile";



}