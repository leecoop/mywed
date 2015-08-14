var URLs = {
    addEditGuest: 'execute/add_edit_guest.php?',
    deleteGuest: 'execute/delete_guest.php?',
    registerUser: 'execute/register_user.php?',
    createGroup: 'execute/create_group.php?',
    updateInvitationSent: 'execute/update_invitation_sent.php?',
    updateArrivalApproved: 'execute/update_arrival_approved.php?',
    filter: 'execute/filter.php?',
    addEditTable: 'execute/add_edit_table.php?',
    addGuestToTable: 'execute/add_guest_to_table.php?',
    removeGuestFromTable: 'execute/remove_guest_from_table.php?',
    deleteTable: 'execute/delete_table.php?',
    getStatistics: 'execute/get_statistics.php?',
    createProject: 'execute/create_project.php?',
    addPermissions: 'execute/add_permissions.php?'
};


var Ajax = {
    sendRequest: function (url, options) {

        //default data
        if (!options.method) options.method = 'post';
        if (!options.contentType) options.contentType = 'text/xml';
        if (!options.returnJson) options.returnJson = false;

        url += ['&rand=', Math.random()].join('');


        if (options.loader) showLoading();
        $.ajax({
            type: options.method,
            url: url,
            data: options.data,
            success: function (response) {
                var callback = (options.callback) ? eval(options.callback) : null;
                if (typeof callback == 'function') callback(response, options.params);
                if (options.loader) hideLoading();
                if (options.refreshStats) refreshStats();

            },
            error: function () {
                if (options.loader) hideLoading();
            }
        });
    }
};

function clear(id, val) {
    $("#" + id).val(val);
}


function trim(str) {
    return str.replace(/^\s+|\s+$/g, "");
}

function addEditGuest(guestOid) {
    var add = guestOid == 0;
    var name = "";
    var phone = "";
    var amount = "";
    var group = "";
    var side = "";
    var invitationSent = 0;
    var arrivalApproved = 0;
    if (add) {
        name = $("#name");
        phone = $("#phone");
        amount = $("#amount");
        group = $("#groups");
        side = $("#sides");
    } else {
        name = $("#editName");
        phone = $("#editPhone");
        amount = $("#editAmount");
        group = $("#editGroups");
        side = $("#editSides");
        invitationSent = ($("#editInvitationSent").hasClass("checkOn")) ? 1 : 0;
        var ediArrivalApproved = $("#ediArrivalApproved a");
        arrivalApproved = (ediArrivalApproved.hasClass("checkOn")) ? 1 : (ediArrivalApproved.hasClass("xOn")) ? 2 : 0;


    }


    Ajax.sendRequest(URLs.addEditGuest, {
        data: {
            name: name.val(),
            phone: phone.val(),
            amount: amount.val(),
            group: group.val(),
            side: side.val(),
            guestOid: guestOid,
            invitationSent: invitationSent,
            arrivalApproved: arrivalApproved,
            loc: $("#loc").val()
        },
        contentType: 'application/json;charset=UTF-8',
        params: {edit: !add, guestOid: guestOid},
        loader: true,
        refreshStats: true,
        callback: 'addEditGuestResponse'
    });


}


function addEditGuestResponse(responseData, params) {
    if (params.edit) {
        table.row("#guest" + params.guestOid).remove();
        $("#editGuestModal").modal("hide");
        editGuestFormValidator.resetForm();

        //closeEditGuestDialog();
    }
    else{
        addGuestFormValidator.resetForm();

    }
    table.row.add($(responseData.data)).draw().show().draw(false);
    //$(rowNode).focus();
    clear("name", "");
    clear("phone", "");
    //clear("sides", "0");
    //clear("groups", "0");
    clear("amount", "1");
    //$("#addGuestForm  .form-control-feedback").removeClass("fa-times fa-check");


}

function deleteGuest(guestOid) {
    Ajax.sendRequest(URLs.deleteGuest, {
        data: {guestOid: guestOid},
        //contentType: 'application/json;charset=UTF-8',
        params: {guestOid: guestOid},
        loader: true,
        refreshStats: true,
        callback: 'deleteGuestResponse'
    });
}

function deleteGuestResponse(response, params) {
    //closeEditGuestDialog();
    $("#editGuestModal").modal("hide");
    fadeOutAndRemoveElement("guest" + params.guestOid);

}

function searchKeyPress(e) {
    var keycode;
    if (window.event) keycode = window.event.keyCode;
    else if (e) keycode = e.which;
    else return true;

    if (keycode == 13) {
        search();
        return false;
    }
    else
        return true;
}

function search() {
    var searchValue = $('#search_text').val();
    $(location).prop('href', "search.php?q=" + searchValue);
}


function createGroup() {
    var groupName = $("#group_name").val();
    Ajax.sendRequest(URLs.createGroup, {
        data: {groupName: groupName},
        //contentType: 'application/json;charset=UTF-8',
        params: {groupName: groupName},
        loader: true,
        callback: 'createGroupResponse'
    });

}
function createGroupResponse(response, params) {
    var newId = response;
    var name = params.groupName;

    var option = $('<option/>');
    option.attr({'value': newId}).text(name);
    $("#groups").append(option);

    var option1 = $('<option/>');
    option1.attr({'value': newId}).text(name);
    $("#editGroups").append(option1);

    var $div = $("<div>", {id: "group_" + newId, class: "tagBG", value: newId});
    $div.attr("onclick", "filter('group_" + newId + "')");
    $div.text(name);

    $("#filterGroups").append($div);

    clear("group_name", "");
    newGroupFormValidator.resetForm();


    //closeCreateGroupDialog();
}

function openEditGuest(guestOid) {
    var guest = $('#guest' + guestOid);

    $("#editName").val(guest.attr("name"));
    $("#editPhone").val(guest.attr("phone"));
    $("#editAmount").val(guest.attr("amount"));
    $("#editGroups").val(guest.attr("group"));
    $("#editSides").val(guest.attr("side"));

    var invitationSent = guest.attr("invitationSent");
    var invitationSentClass = (invitationSent == 0) ? "checkOff" : "checkOn";
    var toggleClass = (invitationSent == 0) ? "checkOn" : "checkOff";

    var editInvitationSent = $("#editInvitationSent");
    editInvitationSent.attr("class", invitationSentClass);
    //editInvitationSent.attr("invitationSent", invitationSent);
    editInvitationSent.attr("onclick", "toggleInvitationSentClass('editInvitationSent')");

    var arrivalApproved = parseInt(guest.attr("arrivalApproved"), 10);
    toggleArrivalApprovedClass("ediArrivalApproved", arrivalApproved);
    $("#editGuestModal").modal();
    $('#editGuestModal').on('hide.bs.modal', function() {
        editGuestFormValidator.resetForm();
        //$("#editGuestForm  .form-control-feedback").removeClass("fa-times fa-check");
    });

    $('#editGuestForm').attr('action', 'javascript:addEditGuest(' + guestOid + ')');
    $("#deleteGuestBtn").attr("onclick", 'deleteGuest(' + guestOid + ')');


}

function updateInvitationSent(guestOid) {
    var element = $("#invitationSent" + guestOid);
    var currentStatus = element.attr("invitationSent");
    var newStatus;
    if (currentStatus == 0) {
        element.attr('class', 'checkOn');
        element.attr("invitationSent", 1);
        newStatus = 1;
    } else {
        element.attr('class', 'checkOff');
        element.attr("invitationSent", 0);
        newStatus = 0;
    }

    Ajax.sendRequest(URLs.updateInvitationSent, {
        data: {guestOid: guestOid, newStatus: newStatus},
        params: {guestOid: guestOid, counter: "invitationsCount"},
        loader: true,
        refreshStats: true,
        callback: 'updateGuestStatusResponse'
    });


}

function updateGuestStatusResponse(response, params) {
    fadeOutAndRemoveElement("guest" + params.guestOid);
    updateCounters(params.counter);

}


function fadeOutAndRemoveElement(id) {
    $("#" + id).fadeOut("slow", function () {
        table.row(this).remove().draw();
    });
}

function updateHasTable(guestOid) {
    var element = $("#hasTable" + guestOid);
    var currentStatus = element.attr("hasTable");
    if (currentStatus == 0) {
        element.attr('class', 'checkOn');
        element.attr("hasTable", 1);
    } else {
        element.attr('class', 'checkOff');
        element.attr("hasTable", 0);
    }

}
function updateArrivalApproved(guestOid, arrivalApproved) {
    updateArrivalApproved(guestOid, arrivalApproved, false);
}

function toggleArrivalApprovedClass(id, arrivalApproved) {
    var element = $("#" + id + " a");
    element.each(function (index) {
        if ($(this).attr("val") == arrivalApproved) {
            $(this).attr("class", $(this).attr("onClass"));
        } else {
            $(this).attr("class", $(this).attr("offClass"));
        }
    });
}

function toggleInvitationSentClass(id) {
    var element = $("#" + id);
    (element.hasClass("checkOff")) ? element.attr("class", "checkOn") : element.attr("class", "checkOff");
}

function updateArrivalApproved(guestOid, arrivalApproved, updateUI) {
    toggleArrivalApprovedClass("arrivalApproved" + guestOid, arrivalApproved);

    Ajax.sendRequest(URLs.updateArrivalApproved, {
        data: {guestOid: guestOid, arrivalApproved: arrivalApproved},
        params: {guestOid: guestOid, updateUI: updateUI, counter: "rsvpsCount"},
        loader: true,
        refreshStats: true,
        callback: 'updateGuestStatusResponse'
    });


}


function updateCounters(menuElementId) {
    var menuCount = $("#" + menuElementId);
    var currentValue = menuCount.attr("value");
    menuCount.text(currentValue - 1);
    menuCount.attr("value", currentValue - 1);

    var totalCount = $("#totalCount");
    currentValue = totalCount.attr("value");
    totalCount.text(currentValue - 1);
    totalCount.attr("value", currentValue - 1);
}

function toggleCheckboxes(caller, id) {
    var newStatus = selectAllCheckedCheckboxes(id).length == 0;
    var title;
    selectAllCheckboxes(id).prop("class", (newStatus) ? "tagBGActive" : "tagBG");
    if (newStatus) {
        title = "כלום";
    } else {
        title = "הכל";
    }
    caller.innerHTML = title;
}

function selectAllCheckboxes(id) {
    return $("#" + id + " div");
}

function selectAllCheckedCheckboxes(id) {
    var array = [];

    $("#" + id + " .tagBGActive").each(function (i, element) {
        array.push(element.getAttribute("value"));
    });

    return array;
}

function filter(id) {
    var item = $('#' + id);
    toggleFilterItemClass(item);
    var sidesIds = selectAllCheckedCheckboxes("filterSides");
    //
    var groupsIds = selectAllCheckedCheckboxes("filterGroups");

    Ajax.sendRequest(URLs.filter, {
        data: {sidesIds: sidesIds.join(","), groupsIds: groupsIds.join(","), loc: $("#loc").val()},
        loader: true,
        callback: 'filterResponse'
    });
}

function filterResponse(response) {
    $('#guestsArea').html(response);
}

function report(loc) {
    var sidesIds = selectAllCheckedCheckboxes("filterSides");
    var groupsIds = selectAllCheckedCheckboxes("filterGroups");

    $(location).prop('href', "execute/reports.php?sidesIds=" + sidesIds.join(",") + "&groupsIds=" + groupsIds.join(",") + "&loc=" + loc);
}


function updateStatisticPanel(data) {
    $('#totalAmount').html(data);
}

function updateAmount(val) {
    var amount = $("#amount");
    var newAmount = parseInt(amount.val()) + val;
    if (newAmount > 0) {
        amount.val(newAmount);
    }
}

function hideLoading() {
    $("#loadingTop").hide();
}

function showLoading() {
    $("#loadingTop").show();

}


function addEditTable(oid) {
    var title;
    var capacity;
    if (oid == 0) {
        title = $("#title").val();
        capacity = $("#amount").val();
    } else {
        title = $("#editTitle").val();
        capacity = $("#editAmount").val();
    }
    Ajax.sendRequest(URLs.addEditTable, {
        data: {title: title, capacity: capacity, tableOid: oid},
        params: {newTable: oid == 0, tableId: oid},
        contentType: 'application/json;charset=UTF-8',
        loader: true,
        callback: 'addEditTableResponse'
    });

}

function addEditTableResponse(response, params) {
    if (params.newTable) {
        $("#tables").append(response.data);
        initSeatingArrangement();
        $("#title").val("");
    } else {
        $("#editTableModal").modal("hide");

    }
    //if(params.newTable){
    //    var title = $('#title');
    //    var currentTableCount= parseInt(title.attr('count'),10);
    //    var newTableCount = currentTableCount+1;
    //    title.attr('count',newTableCount);
    //    title.val("שולחן " + newTableCount);
    //
    //}

}

function initSeatingArrangement() {
    //$("#catalog").accordion();
    $("#catalog li").draggable({
        appendTo: "body",
        helper: "clone",
        cursor: "move",
        revert: "invalid",
        cursorAt: {left: 90}

    });
    $("#tables ol").droppable({
        //activeClass: "ui-state-default",
        //hoverClass: "ui-state-hover",
        accept: ":not(.ui-sortable-helper)",
        drop: function (event, ui) {
            if (parseInt(this.parentNode.parentNode.getAttribute("max"), 10) >= parseInt(ui.draggable.attr("amount"), 10) + parseInt($("#" + this.parentNode.parentNode.id + " .current_amount").html(), 10)) {
                $(this).find(".placeholder").remove();
                tableDrop(ui.draggable, this, this.parentNode.parentNode.id);
            }

        }
    }).sortable({
        items: "div:not(.placeholder)",
        sort: function () {
            // gets added unintentionally by droppable interacting with sortable
            // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
            $(this).removeClass("ui-state-default");
        }
    });
    //$(".seating_table").draggable();

}


function tableDrop(guest, table, tableId) {
    Ajax.sendRequest(URLs.addGuestToTable, {
        data: {
            guestOid: guest.attr("oid"),
            name: guest.attr("firstName"),
            amount: guest.attr("amount"),
            tableOid: $("#" + tableId).attr("oid")
        },
        params: {guest: guest, table: table, tableId: tableId},
        loader: true,
        refreshStats: true,
        callback: 'tableDropResponse'
    });


}


function tableDropResponse(response, params) {
    params.guest.hide();
    var li = $(response.data);
    li.appendTo(params.table);

    var tableCurrentAmountSpan = $("#" + params.tableId + " .current_amount");
    var currentAmount = parseInt(tableCurrentAmountSpan.html(), 10);
    var guestAmount = parseInt(params.guest.attr("amount"), 10);
    var newAmount = currentAmount + guestAmount;


    tableCurrentAmountSpan.html(newAmount);

}

function removeGuestFromTable(guestOid, tableId) {
    Ajax.sendRequest(URLs.removeGuestFromTable, {
        data: {guestOid: guestOid},
        params: {guestOid: guestOid, tableId: tableId},
        loader: true,
        refreshStats: true,
        callback: 'removeGuestFromTableResponse'
    });
}

function removeGuestFromTableResponse(response, params) {

    var guest = $("#table" + params.tableId + " li[oid='" + params.guestOid + "']");

    var tableCurrentAmountSpan = $("#table" + params.tableId + " .current_amount");
    var currentAmount = parseInt(tableCurrentAmountSpan.html(), 10);
    var guestAmount = parseInt(guest.attr("amount"), 10);
    var newAmount = currentAmount - guestAmount;
    tableCurrentAmountSpan.html(newAmount);
    guest.remove();
    $("#guest" + params.guestOid).show();


}


function deleteTable(tableOid) {
    Ajax.sendRequest(URLs.deleteTable, {
        data: {tableOid: tableOid},
        params: {tableOid: tableOid},
        loader: true,
        refreshStats: true,
        callback: 'deleteTableResponse'
    });
}

function deleteTableResponse(response, params) {
    $("#table" + params.tableOid).fadeOut("slow", function () {
        $("#table" + params.tableOid + " li").each(function (i, element) {
            $("#guest" + $(this).attr("oid")).show();
        });
        $(this).parent().remove();
    });
}

function toggleFilterItemClass(item) {
    if (item.attr('class') == "tagBG") {
        item.attr('class', "tagBGActive");
    } else {
        item.attr('class', "tagBG")
    }

}

function refreshStats() {
    Ajax.sendRequest(URLs.getStatistics, {
        callback: 'refreshStatsResponse'
    });
}

function refreshStatsResponse(responseData, params) {

    try {
        g1.refresh(responseData.totalGuests);
    } catch (e) {
    }
    try {
        g2.refresh(responseData.invitationSent);
    } catch (e) {
    }
    try {
        g3.refresh(responseData.arrivalApproved);
    } catch (e) {
    }
    try {
        g4.refresh(responseData.hasTable);
    } catch (e) {
    }


}

function register() {
    //var groomName = $("#groom_name").val();
    //var brideName = $("#bride_name").val();
    //var date = $("#date").val();
    var email = $("#email").val();
    var password = $("#password").val();


    Ajax.sendRequest(URLs.registerUser, {
        data: {
            //groomName: groomName,
            //brideName: brideName,
            //date: date,
            email: email,
            password: password

        },
        contentType: 'application/json;charset=UTF-8',
        //params: {edit: !add, guestOid: guestOid},
        loader: true,
        //refreshStats: true,
        callback: 'registerResponse'
    });


}

function registerResponse(response, params) {
    if (response.error == false) {
        window.location.href = response.redirectLink;

    }else{
        alert('ERROR !');
    }

}

function checkLogin() {
    $('#errorMsg').addClass("hidden");
    var email = $("#email").val();
    var password = $("#password").val();

    Ajax.sendRequest("check_login.php?", {
        data: {
            email: email,
            password: password


        },
        contentType: 'application/json;charset=UTF-8',
        //params: {edit: !add, guestOid: guestOid},
        loader: true,
        //refreshStats: true,
        callback: 'checkLoginResponse'
    });
    //return false;
}

function checkLoginResponse(response, params) {
    if (response.error == false) {
        window.location.href = "index.php";
    }

    else {
        $('#errorMsg').text(response.errorMsg).removeClass("hidden");
    }

}
//$(function () {
//    $(".only-numbers").keypress(function (event) {
//        // Backspace, tab, enter, end, home, left, right
//        // We don't support the del key in Opera because del == . == 46.
//        var controlKeys = [8, 9, 13, 35, 36, 37, 39];
//        // IE doesn't support indexOf
//        var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
//        // Some browsers just don't raise events for control keys. Easy.
//        // e.g. Safari backspace.
//        if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
//            (48 <= event.which && event.which <= 57) || // Always 1 through 9
//            isControlKey) { // Opera assigns values for control keys.
//            return;
//        } else {
//            event.preventDefault();
//        }
//    });
//});

function createProject() {
    var maleName = $("#maleName").val();
    var femaleName = $("#femaleName").val();
    var date = $("#date").val();


    Ajax.sendRequest(URLs.createProject, {
        data: {
            maleName: maleName,
            femaleName: femaleName,
            date: date


        },
        contentType: 'application/json;charset=UTF-8',
        //params: {edit: !add, guestOid: guestOid},
        loader: true,
        //refreshStats: true,
        callback: 'createProjectResponse'
    });


}

function createProjectResponse(response, params) {
    if (response.error == false) {
        window.location.href = "index.php";

    }

}


function openEditTableModel(tableId) {
    var table = $('#table' + tableId);

    $("#editTitle").val(table.attr("title"));
    $("#editAmount").val(table.attr("max"));

    $('#editTableForm').attr('action', 'javascript:addEditTable(' + tableId + ')');
    $('#deleteTableBtn').attr('onclick', 'deleteTable(' + tableId + ')');

    $("#editTableModal").modal();
}

function addPermissions() {
    var email = $("#email").val();
    Ajax.sendRequest(URLs.addPermissions, {
        data: {email: email},
        loader: true,
        callback: 'addPermissionsResponse'
    });

}

function addPermissionsResponse(response, params) {
    $("#addPermissionsResponseMsg").html(response.data);

    $('#systemMsg').delay(4000).fadeOut('slow', function () {
        $(this).remove()
    });

    if (response.error == false) {
        clear("email", "");
    }



}

