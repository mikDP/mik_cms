function checkAvailability() {
//    $("#loaderIcon").show();
    jQuery.ajax({
        url: "../../controller/check_availability.php",
        data: 'user=' + $("#user").val(),
        type: "POST",
        success: function (data) {
            $("#user-availability-status").html(data);
            //$("#loaderIcon").hide();
        },
        error: function () {}
    });
}