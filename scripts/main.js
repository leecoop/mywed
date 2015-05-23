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

    }


    Ajax.sendRequest("execute/add_edit_guest.php?", {
        data: {name: name.val(), lastName: lastName.val(), phone: phone.val(), amount: amount.val(), group: group.val(), side: side.val(), guestOid: guestOid},
        contentType: 'application/json;charset=UTF-8',
        params: {edit: !add},
        loader: true,
        callback: 'addEditGuestResponse'
    });


}

function deleteGuest(guestOid) {
    $.post("execute/delete_guest.php?", {
        guestOid: guestOid
    }, deleteGuestResponse);
}

function deleteGuestResponse(data) {
    closeEditGuestDialog();
    fadeOutAndRemoveElement("guest" + data);

}


function addEditGuestResponse(responseData, params) {
    $("#guestsTable tr:first").after(responseData.data);
    if(params.edit) {
        closeEditGuestDialog();
    }

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
    $.post("execute/search.php?", {search_value: searchValue.val()}, searchResponse);
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
    var groupName = $("#group_name");

    var allValidationPassed = 0;
    //allValidationPassed += valid(groupName);

    if (allValidationPassed == 0) {
        $.post("execute/create_group.php?", {groupName: groupName.val()}, createGroupResponse);
    }
}
function createGroupResponse(data) {
    var newId = data;
    var name = $("#group_name").val();

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
    updateInvitationSent(guestOid, false);
}

function updateInvitationSent(guestOid, updateUI) {
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

    $.post("execute/update_invitation_sent.php?", {guestOid: guestOid, newStatus: newStatus});

    if (updateUI) {
        fadeOutAndRemoveElement("guest" + guestOid);
        updateCounters("invitationsCount");
    }


}


function fadeOutAndRemoveElement(id) {
    $("#" + id).fadeOut("slow", function () {
        $(this).remove();
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

function updateArrivalApproved(guestOid, arrivalApproved, updateUI) {
    var element = $("#arrivalApproved" + guestOid + " a");
    element.each(function (index) {
        if ($(this).attr("val") == arrivalApproved) {
            $(this).attr("class", $(this).attr("onClass"));
        } else {
            $(this).attr("class", $(this).attr("offClass"));
        }
    });

    $.post("execute/update_arrival_approved.php?", {guestOid: guestOid, arrivalApproved: arrivalApproved});

    if (updateUI) {
        fadeOutAndRemoveElement("guest" + guestOid);
        updateCounters("rsvpsCount");
    }


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
    return $("#" + id + " input[type='checkbox']:checked");
}

function filter(loc) {
    var sidesIds = [];
    selectAllCheckedCheckboxes("filterSides").each(function (i, element) {
        sidesIds.push(element.value);
    });

    var groupsIds = [];
    selectAllCheckedCheckboxes("filterGroups").each(function (i, element) {
        groupsIds.push(element.value);
    });
    showLoading();
    $.post("execute/filter.php?", {sidesIds: sidesIds.join(","), groupsIds: groupsIds.join(","), loc: loc}, filterResponse);
}

function report(loc) {
    var sidesIds = [];
    selectAllCheckedCheckboxes("filterSides").each(function (i, element) {
        sidesIds.push(element.value);
    });

    var groupsIds = [];
    selectAllCheckedCheckboxes("filterGroups").each(function (i, element) {
        groupsIds.push(element.value);
    });
    $(location).prop('href', "execute/reports.php?sidesIds=" + sidesIds.join(",") + "&groupsIds=" + groupsIds.join(",") + "&loc=" + loc);

}

function filterResponse(data) {
    $('#guestsArea').html(data);
    hideLoading();
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





