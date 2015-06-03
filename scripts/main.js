var URLs = {
    addEditGuest: 'execute/add_edit_guest.php?',
    deleteGuest: 'execute/delete_guest.php?',
    search: 'execute/search.php?',
    createGroup: 'execute/create_group.php?',
    updateInvitationSent: 'execute/update_invitation_sent.php?',
    updateArrivalApproved: 'execute/update_arrival_approved.php?',
    filter: 'execute/filter.php?',
    addNewTable: 'execute/add_new_table.php?'
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

            },
            error: function () {
                if (options.loader) hideLoading();
            }
        });
    }
};

function clear(id) {
    $(id).value = '';
}

function trim(str) {
    return str.replace(/^\s+|\s+$/g, "");
}

function addEditGuest(guestOid) {
    var add = guestOid == 0;
    var name = "";
    var lastName = "";
    var phone = "";
    var amount = "";
    var group = "";
    var side = "";
    var invitationSent = 0;
    var arrivalApproved = 0;
    if (add) {
        name = $("#name");
        lastName = $("#lastName");
        phone = $("#phone");
        amount = $("#amount");
        group = $("#groups");
        side = $("#sides");
    } else {
        name = $("#editName");
        lastName = $("#editLastName");
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
            lastName: lastName.val(),
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
        callback: 'addEditGuestResponse'
    });


}


function addEditGuestResponse(responseData, params) {
    if (params.edit) {
        table.row("#guest" + params.guestOid).remove();
        closeEditGuestDialog();
    }
    //$("#guestsTable tr:first").after(responseData.data);

    var guest = responseData.guest;
    var rowNode = table.row.add([
        "<a href=\"javascript:void(0)\" class=\"edit\" onclick='openEditGuest(\""+params.guestOid+"\")'></a>",
        guest.name,
        guest.lastName,
        guest.amount,
        guest.phone,
        guest.side,
        guest.group
    ])
        .draw()
        .node();
    $(rowNode).attr({
        id: "guest" + guest.oid,
        name: guest.name,
        lastname: guest.lastName,
        amount: guest.amount,
        phone: guest.phone,
        side: guest.sideId,
        group: guest.groupId,
        arrivalapproved: guest.arrivalApproved,
        invitationsent: guest.invitationSent
    });


}

function deleteGuest(guestOid) {
    Ajax.sendRequest(URLs.deleteGuest, {
        data: {guestOid: guestOid},
        //contentType: 'application/json;charset=UTF-8',
        params: {guestOid: guestOid},
        loader: true,
        callback: 'deleteGuestResponse'
    });
}

function deleteGuestResponse(response, params) {
    closeEditGuestDialog();
    fadeOutAndRemoveElement("guest" + params.guestOid);

}

function searchKeyPress(e) {
    if (window.event) {
        e = window.event;
    }
    if (e.keyCode == 13 || event.keyCode == 13) {
        search();
    }
}

function search() {

    var searchValue = $('#search_text');
    $.post(URLs.search, {search_value: searchValue.val()}, searchResponse);
}

function searchResponse(data) {
    $('#searchContent').html(data);
}

function openCreateGroupDialog() {
    createGroupDialog.dialog("open");

}

function closeCreateGroupDialog() {
    createGroupDialog.dialog("close");

}
function openEditGuestDialog() {
    editGuestDialog.dialog("open");
}

function closeEditGuestDialog() {
    editGuestDialog.dialog("close");
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

    closeCreateGroupDialog();
}

function openEditGuest(guestOid) {
    var guest = $('#guest' + guestOid);

    $("#editName").val(guest.attr("name"));
    $("#editLastName").val(guest.attr("lastName"));
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

    editGuestDialog.dialog("option", "buttons",
        [

            {
                text: "עדכן",

                click: function () {
                    addEditGuest(guestOid);
                }

            },

            {
                text: "בטל",

                click: function () {
                    editGuestDialog.dialog("close");
                }
            },
            {
                text: "מחק",

                click: function () {
                    deleteGuest(guestOid);
                }

            }

        ]
    );
    openEditGuestDialog();
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
    selectAllCheckboxes(id).prop("checked", newStatus);
    if (newStatus) {
        title = "כלום";
    } else {
        title = "הכל";
    }
    caller.innerHTML = title;
}

function selectAllCheckboxes(id) {
    return $("#" + id + " input[type='checkbox']");
}

function selectAllCheckedCheckboxes(id) {
    var array = [];

    $("#" + id + " input[type='checkbox']:checked").each(function (i, element) {
        array.push(element.value);
    });

    return array;
}

function filter(loc) {
    var sidesIds = selectAllCheckedCheckboxes("filterSides");

    var groupsIds = selectAllCheckedCheckboxes("filterGroups");

    Ajax.sendRequest(URLs.filter, {
        data: {sidesIds: sidesIds.join(","), groupsIds: groupsIds.join(","), loc: loc},
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


function addTable(){
    Ajax.sendRequest(URLs.addNewTable, {
        //data: {sidesIds: sidesIds.join(","), groupsIds: groupsIds.join(","), loc: loc},
        contentType: 'application/json;charset=UTF-8',
        loader: true,
        callback: 'addTableResponse'
    });
}

function addTableResponse(response, params){
    $("#tables").append(response.data);
    $( "#tables ol" ).droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        accept: ":not(.ui-sortable-helper)",
        drop: function( event, ui ) {
            $( this ).find( ".placeholder" ).remove();
            $( "<li id='"+ui.draggable.attr("id")+"'></li>" ).text( ui.draggable.text() ).appendTo( this );
            ui.draggable.hide();

        }
    }).sortable({
        items: "li:not(.placeholder)",
        sort: function() {
            // gets added unintentionally by droppable interacting with sortable
            // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
            $( this ).removeClass( "ui-state-default" );
        }
    });
    $( ".seating_table" ).draggable();

}


