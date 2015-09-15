$(document).click(function (event) {
    window.lastElementClicked = event.target;
});

jQuery.fn.exists = function () {
    return this.length > 0;
};

var URLs = {
    addEditGuest: 'execute/add-edit-guest?',
    deleteGuest: 'execute/delete-guest?',
    registerUser: 'execute/register-user?',
    createGroup: 'execute/create-group?',
    updateInvitationSent: 'execute/update-invitation-sent?',
    updateArrivalApproved: 'execute/update-arrival-approved?',
    filter: 'execute/filter?',
    addEditTable: 'execute/add-edit-table?',
    addGuestToTable: 'execute/add-guest-to-table?',
    removeGuestFromTable: 'execute/remove-guest-from-table?',
    deleteTable: 'execute/delete-table?',
    //getStatistics: 'execute/get-statistics?',
    createProject: 'execute/create-project?',
    addPermissions: 'execute/add-permissions?',
    check_login: 'execute/check-login?',
    changePassword: 'execute/change-password?'

};


var Ajax = {
    sendRequest: function (url, options) {

        //default data
        if (!options.method) options.method = 'post';
        if (!options.contentType) options.contentType = 'text/xml';
        if (!options.returnJson) options.returnJson = false;
        if (!options.refreshStats) options.refreshStats = false;
        if (!options.showNotification) options.showNotification = false;

        url += ['&rand=', Math.random()].join('');
        options.data['refreshStats'] = options.refreshStats;


        if (options.loader) showLoading();
        $.ajax({
            type: options.method,
            url: url,
            data: options.data,
            success: function (response) {
                if (options.loader) hideLoading();

                if (isExist(response.dbConnectionError) && response.dbConnectionError === true) {
                    showErrorMassage();
                } else {
                    var showNotificationOnBtn = $(lastElementClicked).parents('form').exists();
                    if (isExist(response.error) && response.error === true) {
                        notification(response.errorMsg, response.error, showNotificationOnBtn)
                    } else {
                        var callback = (options.callback) ? eval(options.callback) : null;
                        if (typeof callback == 'function') callback(response, options.params);
                        if (options.refreshStats) refreshStats(response.stat);
                        if (options.showNotification) {
                            notification(response.message, response.error, showNotificationOnBtn);
                        }

                    }
                }

            },
            error: function () {
                if (options.loader) hideLoading();
            }
        });
    }
};

function notification(message, isError, onElement) {
    message = isExist(message) ? message : (isError) ? jsTranslation.defaultError : jsTranslation.defaultSuccess;
    if (onElement) {
        $(lastElementClicked).notify(message, {
            className: (isError) ? 'error' : 'success',
            autoHideDelay: 3000,
            elementPosition: 'top center'
        });
    } else {
        $.notify(message, {
            className: (isError) ? 'error' : 'success',
            autoHideDelay: 3000,
            elementPosition: 'top right'
        });
    }
}

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
    var gift = 0;
    var table = 0;
    var loc = $("#loc").val();
    var hideElement = false;

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
        gift = $("#editGift").val();
        group = $("#editGroups");
        side = $("#editSides");
        table = $("#editTables").val();
        invitationSent = ($("#editInvitationSent").hasClass("btn-default")) ? 0 : 1;
        var ediArrivalApproved = $("#ediArrivalApproved button");
        arrivalApproved = (ediArrivalApproved.hasClass("btn-success")) ? 1 : (ediArrivalApproved.hasClass("btn-warning")) ? 2 : (ediArrivalApproved.hasClass("btn-danger")) ? 3 : 0;
        hideElement = ((loc == "invitations" && invitationSent === 1) || (loc == "rsvps" && arrivalApproved !== 0));
    }

    Ajax.sendRequest(URLs.addEditGuest, {
        data: {
            name: name.val(),
            phone: phone.val(),
            amount: amount.val(),
            gift: gift,
            group: group.val(),
            side: side.val(),
            guestOid: guestOid,
            invitationSent: invitationSent,
            arrivalApproved: arrivalApproved,
            table: table,
            loc: loc
        },
        contentType: 'application/json;charset=UTF-8',
        params: {edit: !add, guestOid: guestOid, loc: loc, hideElement: hideElement},
        loader: true,
        refreshStats: true,
        showNotification: ($('#addGuestPanelSlick').exists()) ? false : true,
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
    else {
        addGuestFormValidator.resetForm();
        var addGuestPanelSlick = $('#addGuestPanelSlick');
        if (addGuestPanelSlick.exists()) {
            addGuestPanelSlick.find('.tab').click();
        }

    }
    table.row.add($(responseData.data)).draw().show().draw(false);

    if (params.hideElement) {
        fadeOutAndRemoveElement("guest" + params.guestOid)
    }
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
        contentType: 'application/json;charset=UTF-8',
        params: {guestOid: guestOid},
        loader: true,
        refreshStats: true,
        callback: 'deleteGuestResponse'
    });
}

function deleteGuestResponse(response, params) {
    if (!response.error) {
        $("#editGuestModal").modal("hide");
        fadeOutAndRemoveElement("guest" + params.guestOid);
    }

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
    $(location).prop('href', "search?q=" + searchValue);
}


function createGroup() {
    var groupName = $("#group_name").val();
    Ajax.sendRequest(URLs.createGroup, {
        data: {groupName: groupName},
        contentType: 'application/json;charset=UTF-8',
        params: {groupName: groupName},
        loader: true,
        showNotification: true,
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
    //notification("קבוצה נוצרה בהתחלה", false);
    //closeCreateGroupDialog();
}

function openEditGuest(guestOid) {
    var guest = $('#guest' + guestOid);

    $("#editName").val(guest.attr("name"));
    $("#editPhone").val(guest.attr("phone"));
    $("#editAmount").val(guest.attr("amount"));
    $("#editGroups").val(guest.attr("group"));
    $("#editSides").val(guest.attr("side"));
    $("#editGift").val(guest.attr("gift"));
    $("#editTables").val(guest.attr("table"));
    //reset ArrivalApprovedClass
    toggleArrivalApprovedClass("ediArrivalApproved", 0);
    var invitationSent = guest.attr("invitationSent");

    var editInvitationSent = $("#editInvitationSent");
    //clear btn classes
    editInvitationSent.removeClass("btn-default btn-success");
    editInvitationSent.addClass((invitationSent == 0) ? "btn-default" : "btn-success");

    var arrivalApproved = parseInt(guest.attr("arrivalApproved"), 10);
    toggleArrivalApprovedClass("ediArrivalApproved", arrivalApproved);
    $("#editGuestModal").modal();
    $('#editGuestModal').on('hide.bs.modal', function () {
        editGuestFormValidator.resetForm();
        //$("#editGuestForm  .form-control-feedback").removeClass("fa-times fa-check");
    });

    $('#editGuestForm').attr('action', 'javascript:addEditGuest(' + guestOid + ')');
    $("#deleteGuestBtn").attr("onclick", 'deleteGuest(' + guestOid + ')');


}

function updateInvitationSent(guestId) {
    var element = $("#invitationSent" + guestId);
    var currentStatus = element.attr("invitationSent");
    var newStatus;
    if (currentStatus == 0) {
        element.removeClass("btn-default").addClass("btn-success");
        element.attr("invitationSent", 1);
        newStatus = 1;
    } else {
        element.removeClass("btn-success").addClass("btn-default");
        element.attr("invitationSent", 0);
        newStatus = 0;
    }

    Ajax.sendRequest(URLs.updateInvitationSent, {
        data: {guestId: guestId, newStatus: newStatus},
        params: {guestId: guestId, invitationSent: newStatus, updateUI: $('#loc').val() === 'invitations'},
        loader: true,
        refreshStats: true,
        callback: 'updateGuestStatusResponse'
    });


}

function updateGuestStatusResponse(response, params) {
    if (isExist(params.arrivalApproved)) {
        $("#guest" + params.guestId).attr("arrivalapproved", params.arrivalApproved);
    }
    if (isExist(params.invitationSent)) {
        $("#guest" + params.guestId).attr("invitationsent", params.invitationSent);
    }

    if (isExist(params.updateUI) && params.updateUI) {
        fadeOutAndRemoveElement("guest" + params.guestId);
    }
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
    var element = $("#" + id + " button");
    element.each(function (index) {
        var that = $(this);
        if (that.attr("val") == arrivalApproved && !that.hasClass(that.attr("onClass"))) {
            $(this).removeClass("btn-default").addClass(that.attr("onClass"));
        } else {
            $(this).addClass("btn-default").removeClass(that.attr("onClass"));
        }
    });
}

function toggleInvitationSentClass(id) {
    var element = $("#" + id);
    (element.hasClass("btn-default")) ? element.removeClass("btn-default").addClass("btn-success") : element.removeClass("btn-success").addClass("btn-default");
}

function updateArrivalApproved(guestId, arrivalApproved, updateUI) {
    if ($("#guest" + guestId).attr("arrivalapproved") == arrivalApproved) {
        arrivalApproved = 0;
    }
    toggleArrivalApprovedClass("arrivalApproved" + guestId, arrivalApproved);
    var amount = $('#guest' + guestId).attr('amount');
    Ajax.sendRequest(URLs.updateArrivalApproved, {
        data: {guestId: guestId, arrivalApproved: arrivalApproved, amount: amount},
        params: {guestId: guestId, updateUI: updateUI, arrivalApproved: arrivalApproved},
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
    if (!response.error) {
        $('#guestsArea').html(response.data);
        $('#filterGroups').children().each(function (i, element) {
            var that = $(element);
            if (jQuery.inArray(that.attr('value'), response.groupSet) !== -1) {
                that.show();
            } else {
                that.hide();
                that.attr('class', "tagBG")
                ;
            }
        });
    }
}

function report(loc) {
    var sidesIds = selectAllCheckedCheckboxes("filterSides");
    var groupsIds = selectAllCheckedCheckboxes("filterGroups");

    $(location).prop('href', "execute/reports?sidesIds=" + sidesIds.join(",") + "&groupsIds=" + groupsIds.join(",") + "&loc=" + loc);
}


function updateAmount(val, elm) {
    var amount = $(elm).siblings("input[name='amount']");
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
        params: {newTable: oid == 0, tableId: oid, title: title, capacity: capacity},
        contentType: 'application/json;charset=UTF-8',
        loader: true,
        callback: 'addEditTableResponse'
    });

}

function addEditTableResponse(response, params) {
    if (params.newTable) {
        $("#tables").append(response.data);
        $("#title").val("");
        initSeatingArrangement();
    } else {
        var table = $('#table' + params.tableId);
        table.attr("title", params.title);
        table.attr("max", params.capacity);

        table.find('.table_title').text(params.title);
        table.find('.max_amount').text(params.capacity);

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
    });
    //    .sortable({
    //    items: "div:not(.placeholder)",
    //    sort: function () {
    //        // gets added unintentionally by droppable interacting with sortable
    //        // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
    //        $(this).removeClass("ui-state-default");
    //    }
    //});


    /////   SORTABLE
    //$( "#tables" ).sortable({
    //    containment: "parent",
    //    cursor: "move",
    //    opacity: 0.8,
    //    revert: true,
    //    update: function( event, ui ) {alert('update ' + ui.position.top + ' ' + ui.position.left )}
    //
    //    //placeholder: "portlet-placeholder"
    //    //placeholder: "ui-state-highlight"
    //});
    //$( "#tables" ).disableSelection();
    ////$( "#tables" ).disableSelection();
    ////$(".seating_table").draggable();

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
    var guest = params.guest;
    var guestAmount = parseInt(guest.attr("amount"), 10);
    var group = guest.parent().data().group;
    updateSeatingArrangementGroupBadge(group, guestAmount);

    guest.hide();
    var li = $(response.data);
    li.appendTo(params.table);

    var tableCurrentAmountSpan = $("#" + params.tableId + " .current_amount");
    var currentAmount = parseInt(tableCurrentAmountSpan.html(), 10);
    var newAmount = currentAmount + guestAmount;


    tableCurrentAmountSpan.html(newAmount);

}

function updateSeatingArrangementGroupBadge(group, guestAmount) {
    var badge = $('#group_' + group).children('span[data-amount]');
    var newBadgeAmount = badge.data().amount - guestAmount;
    badge.data("amount", newBadgeAmount);
    badge.text(newBadgeAmount);

    var parent = badge.parents('[data-parent-group]');
    if (newBadgeAmount == 0 && parent.is(":visible")) {
        parent.hide();
    }
    if (newBadgeAmount > 0 && !parent.is(":visible")) {
        parent.show();
    }


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

    guest = $("#guest" + params.guestOid);
    guest.show();
    updateSeatingArrangementGroupBadge(guest.parent().data().group, guestAmount * (-1));

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
    var map = {}; // or var map = {};
    $("#table" + params.tableOid).fadeOut("slow", function () {
        $("#table" + params.tableOid + " li").each(function (i, element) {
                var guest = $("#guest" + $(this).attr("oid"));
                var group = guest.parent().data().group;
                if (!isExist(map[group])) {
                    map[group] = 0;
                }
                map[group] = map[group] + parseInt(guest.attr("amount"), 10);
                guest.show();

            }
        );
        $(this).parent().remove();
        $.each(map, function (key, value) {
            updateSeatingArrangementGroupBadge(key, (value * (-1)));
        });


    });
    $("#editTableModal").modal("hide");


}

function toggleFilterItemClass(item) {
    if (item.attr('class') == "tagBG") {
        item.attr('class', "tagBGActive");
    } else {
        item.attr('class', "tagBG")
    }

}

//function refreshStats() {
//    Ajax.sendRequest(URLs.getStatistics, {
//        callback: 'refreshStatsResponse'
//    });
//}
//
//function refreshStatsResponse(responseData, params) {
//
//    try {
//        g1.refresh(responseData.totalGuests);
//    } catch (e) {
//    }
//    try {
//        g2.refresh(responseData.invitationSent);
//    } catch (e) {
//    }
//    try {
//        g3.refresh(responseData.arrivalApproved);
//    } catch (e) {
//    }
//    try {
//        g4.refresh(responseData.hasTable);
//    } catch (e) {
//    }
//
//
//}

function refreshStats(data) {

    try {
        g1.refresh(data.totalGuests);
    } catch (e) {
    }
    try {
        g2.refresh(data.invitationSent);
    } catch (e) {
    }
    try {
        g3.refresh(data.arrivalApproved);
    } catch (e) {
    }
    try {
        g4.refresh(data.hasTable);
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

    } else {
        alert('ERROR !');
    }

}

function checkLogin() {
    $('#errorMsg').addClass("hidden");
    var email = $("#email").val();
    var password = $("#password").val();

    Ajax.sendRequest(URLs.check_login, {
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
        window.location.href = "index";
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
        window.location.href = "index";

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

function showErrorMassage() {
    $("#generalErrorModal").modal("show");

}

function isExist(attr) {
    return typeof attr != 'undefined'
}

function changePassword() {

    Ajax.sendRequest(URLs.changePassword, {
        data: {
            currentPassword: $("#currentPassword").val(),
            newPassword: $("#newPassword").val()

        },
        contentType: 'application/json;charset=UTF-8',
        loader: true,
        callback: 'changePasswordResponse'
    });
}

function changePasswordResponse(response, params) {
    if (!response.error) {
        clear("currentPassword", "");
        clear("newPassword", "");
        clear("confirmNewPassword", "");
    }

}

function openVerifyAmountModal(guestId) {
    $('#verifyAmount').val($('#guest' + guestId).attr('amount'));
    $("#verifyAmountBtn").attr("onclick", 'verifyAmountAndUpdateRsvps(' + guestId + ')');
    $("#verifyAmountModal").modal({backdrop: false});
}

function verifyAmountAndUpdateRsvps(guestId) {
    $("#verifyAmountModal").modal("hide");
    $('#guest' + guestId).attr('amount', $('#verifyAmount').val());
    updateArrivalApproved(guestId, 1, true);
}

