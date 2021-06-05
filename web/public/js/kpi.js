$(document).ready(function(){

    $(document).on("click", "table button", function(){
        $("#trigger_modal").trigger("click");
        $("#profile .modal-title").html("UPDATE INFO");
        // $("#profile .modal-body").html($("#profile").html());
        $('#profile input[id="kpi"]').val($(this).data("id"));
        $('#profile input[id="Key_Result_Areas"]').val($(this).closest("tr").find("td:nth-child(1)").text());
        $('#profile input[id="Key_Performance_Indicators"]').val($(this).closest("tr").find("td:nth-child(2)").text());
        $('#profile input[id="Weight_of_KPIs"]').val($(this).closest("tr").find("td:nth-child(3)").text());
        $('#profile input[id="Target"]').val($(this).closest("tr").find("td:nth-child(4)").text());

    });
});