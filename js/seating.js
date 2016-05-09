var tableMap = {};

$(document).ready(function ($) {
    $('#search-input').on('input', function (e) {
        var searchText = $('#search-input').val().trim();
        var all = $("div[data-guest-name]");
        all.each(function (i, element) {
            var guest = $(element);
            var guestName = guest.data().guestName.toString();
            if (guestName.indexOf(searchText) >= 0) {
                guest.parent().show();
            } else {
                guest.parent().hide();
            }
        });
    });


    $("div [id^='table']").each(function (i, element) {
        var jqObj = $(element);
        tableMap[jqObj.data().tableId] = jqObj;
    })

});


function updateArrivedStatus(guestId) {
    var guest = $('#guest' + guestId);
    var amount = toInt(guest.attr('amount'));
    var guestData = guest.data();
    var originalAmount = toInt(guestData.originalAmount);
    var tableId = guestData.tableId;

    if (guestData.tableId == '0') {
        swal({
                title: "למוזמן אין שולחן",
                text: 				"יש למצא למוזמן שולחן עם " + amount + " מקומות פנויים",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "עבור לסידור ישיבה",
                cancelButtonText: "סגור",
                closeOnConfirm: false
            },
            //function(){
            //    $(location).prop('href', "seating-arrangement");
            //}),
        function(isConfirm){
            if (isConfirm) {
                $(location).prop('href', "seating-arrangement");
            } else {
            }});
        return false;

    } else {
        //if (originalAmount != amount) {
        //    var delta = originalAmount - amount;
        //    var table = tableMap[guestData.tableId];
        //    if (amount < originalAmount) {
        //        table.data("expectedTakenSeats", table.data().expectedTakenSeats - delta);
        //    } else {
        //        //server find me a table
        //        showErrorMassage();
        //        return false;
        //    }
        //}

    }


    Ajax.sendRequest(URLs.updateArrivedStatus, {
        data: {guestId: guestId, amount: amount},
        params: {guestId: guestId, amount: amount, tableId: tableId},
        loader: true,
        //refreshStats: true,
        callback: 'updateArrivedStatusResponse'
    });
}

function updateArrivedStatusResponse(response, params) {


    var guest = $("#guest" + params.guestId);

    guest.parent().fadeOut("slow", function () {
        this.remove();
    });

    var table = $('#table' + params.tableId);

    var tableLI = table.parent();
    var ul = tableLI.parent();
    tableLI.fadeOut(500, function () {
        tableLI.prependTo(ul);
    });

    tableLI.fadeIn(500, function () {
        var freeSeatsElem = table.find("span[data-type='free-seats']");
        var prevFreeSeatsValue = toInt(freeSeatsElem.text());
        var newFreeSeatsValue = prevFreeSeatsValue - params.amount;
        freeSeatsElem.text(newFreeSeatsValue);

        var progressBar = table.find(".progress-bar");
        var totalSeatsVal = toInt(progressBar.attr("aria-valuemax"));
        var prevTakenSeatsVal = toInt(progressBar.attr("aria-valuenow"));
        var newTakenSeatsVal = prevTakenSeatsVal + params.amount;
        var newPercent = calcPercent(newTakenSeatsVal, totalSeatsVal, true);
        progressBar.css("width", (((newPercent) < 100) ? newPercent : 100) + "%");
        progressBar.attr("aria-valuenow", newTakenSeatsVal);
        if (newTakenSeatsVal > totalSeatsVal) {
            progressBar.removeClass("progress-bar-success").addClass("progress-bar-danger");
        }

        progressBar.find(".taken-seats").text(newTakenSeatsVal);
    });


}

//function searchForTables(userId){
//
//    var optionalTables = [];
//    tableArray.each(function(i, elem){
//        var data = $(elem).data();
//        if((data.tableCapacity - data.expectedTakenSeats) > 0){
//            optionalTables.push(elem);
//        }
//    });
//
//    alert('a');
//
//}