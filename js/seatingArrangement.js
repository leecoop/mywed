var POSITION_TYPE = {
    TOP: "top",
    LEFT: "left"
};
var startPosition;
var startOffset;
var containerHeight;
var containerWidth;
var container;

$(document).ready(function ($) {
    $(window).scrollTop(0);

    initSeatingArrangement();

    var groupsContainer = $('#groupsContainer');
    var initWidth = groupsContainer.outerWidth();

    var groupsContainerTop = groupsContainer.offset().top;
    var initHeight = groupsContainer.outerHeight();

    $('#groupsContainerAlias').css('height', initHeight);
    $(window).scroll(function () {
        if ($(window).scrollTop() > groupsContainerTop) {
            $('#groupsContainer').css({position: 'fixed', top: '0px', width: initWidth});
            $('#groupsContainerAlias').css('display', 'block');

        } else {
            $('#groupsContainer').css({position: 'static', top: '0px'});
            $('#groupsContainerAlias').css('display', 'none');
        }
    });
    container = $('#seatingArrangementTables');
    containerHeight = container.height();
    containerWidth = container.outerWidth();

});

function initSeatingArrangement() {
    setActiveFirstVisibleGroupPill();

    $(".guestsArea").sortable({
        connectWith: ".guestsArea",
        placeholder: "ui-state-highlight",
        items: "li:not(.placeholder )",
        receive: function (event, ui) {
            var guest = ui.item;
            var from = ui.sender;
            var to = $(this);
            var toType = to.data().type;

            if (toType == 'group') {
                var groupId = guest.data().group;
                if (groupId != to.parent().data().parentGroup) {
                    moveGuestToGroup(guest);
                }
                removeGuestFromTable(guest.data().oid, from.data().tableOid);
            } else {
                var toTableMaxCapacity = parseInt(to.parent().parent().find(".max_amount").text(), 10);
                var toTableCurrentCapacity = parseInt(to.parent().parent().find(".current_amount").text(), 10);
                var newAmount = parseInt(guest.data().amount, 10) + toTableCurrentCapacity;
                if (toTableMaxCapacity >= newAmount) {
                    to.find(".placeholder").remove();
                    dropGuestToTable(guest, from, to, newAmount);
                } else {
                    from.sortable('cancel');
                }
            }


        }
    }).disableSelection();

    $(".draggable").draggable({
        containment: "parent",
        cursor: "move",
        opacity: 0.8,
        handle: ".panel-heading",
        cancel: ".zoom-icon",
        zIndex: 10000,

        stop: function (event, ui) {
            //var container = $('#seatingArrangementTables');
            //var containerHeight = container.height();
            //var containerWidth = container.outerWidth();
            //$(ui.helper).css("width", "");
            //$(ui.helper).css("height", "");
            //updateTablePosition($(ui.helper).data().table, calcPercent(ui.position.top, containerHeight), calcPercent(ui.position.left, containerWidth));

        },
        start: function (evt, ui) {
            startOffset = ui.helper.offset();
            startPosition = ui.helper.position();
        }
    });


    $(".droppable").droppable({
        accept: ".draggable:not(.table_normal)",
        activeClass: "state-default",
        hoverClass: "ui-state-hover",
        drop: function (event, ui) {
            onDropTable(ui.draggable, $(this));
        }
    })

}

function dropGuestToTable(guest, from, to, newAmount) {
    Ajax.sendRequest(URLs.addGuestToTable, {
        data: {
            guestOid: guest.data().oid,
            tableOid: to.data().tableOid
        },
        params: {guest: guest, from: from, to: to, newAmount: newAmount},
        loader: true,
        //refreshStats: true,
        callback: 'dropGuestToTableResponse'
    });


}


function dropGuestToTableResponse(response, params) {
    var guest = params.guest;
    var guestAmount = parseInt(guest.data().amount, 10);
    var group = guest.data().group;

    var fromType = params.from.data().type;
    var toType = params.to.data().type;

    // group ->> table
    if (fromType == 'group' && toType == 'table') {
        updateSeatingArrangementGroupBadge(group, guestAmount);
    }

    //table ->> table
    if (fromType == 'table' && toType == 'table') {
        var fromCurrentAmountElem = params.from.parent().parent().find(".current_amount");
        var fromCurrentAmount = fromCurrentAmountElem.text();
        fromCurrentAmountElem.html(parseInt(fromCurrentAmount, 10) - guestAmount);
    }

    params.to.parent().parent().find(".current_amount").html(params.newAmount);
}

function deleteGuestFromTable(guest) {
    var guestId = guest.data().oid;
    var tableId = guest.parent().data().tableOid;

    moveGuestToGroup(guest);
    removeGuestFromTable(guestId, tableId);
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

    var guest = $("#guest" + params.guestOid);
    var tableCurrentAmountSpan = $("#table" + params.tableId + " .current_amount");

    var currentAmount = parseInt(tableCurrentAmountSpan.html(), 10);
    var guestAmount = parseInt(guest.data().amount, 10);
    var newAmount = currentAmount - guestAmount;
    tableCurrentAmountSpan.html(newAmount);
    updateSeatingArrangementGroupBadge(guest.data().group, guestAmount * (-1));

}

function updateSeatingArrangementGroupBadge(groupId, guestAmount) {
    var badge = $('#group_' + groupId).children('span[data-amount]');
    var newBadgeAmount = badge.data().amount - guestAmount;
    badge.data("amount", newBadgeAmount);
    badge.text(newBadgeAmount);

    showHideGroupPill(groupId);
}

function showGroupPill(groupId) {
    $('[data-parent-group].active').removeClass("active");
    $('li[data-parent-group="' + groupId + '"]').removeClass("hide").addClass("active");
    $('#' + groupId).addClass("active in");

}

function hideGroupPill(groupId) {
    $('li[data-parent-group="' + groupId + '"]').addClass("hide");
    $('[data-parent-group="' + groupId + '"]').removeClass("active")

}

function showHideGroupPill(groupId) {
    var group = $('li[data-parent-group="' + groupId + '"]');
    var groupAmount = group.find(".badge").data().amount;

    if (groupAmount == 0 && group.is(":visible")) {
        hideGroupPill(groupId);
        setActiveFirstVisibleGroupPill();

    }
    if (groupAmount > 0 && (!group.is(":visible") || !isActiveGroup(groupId))) {
        showGroupPill(groupId);
    }
}

function isActiveGroup(groupId) {
    $('li[data-parent-group="' + groupId + '"]').hasClass("active");

}


function setActiveFirstVisibleGroupPill() {
    var firstVisibleGroup = $('#groups li:visible:first');
    if (firstVisibleGroup.length > 0) {
        firstVisibleGroup.addClass("active");
        $('#' + firstVisibleGroup.data().parentGroup).addClass("active in");
    }
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
    var map = {};
    $("#table" + params.tableOid).fadeOut("slow", function () {
        $("#table" + params.tableOid + " li").each(function (i, element) {
                var guest = $(element);
                var group = guest.data().group;
                if (!isExist(map[group])) {
                    map[group] = 0;
                }
                map[group] = map[group] + parseInt(guest.data().amount, 10);
                moveGuestToGroup(guest);
            }
        );
        $(this).parent().remove();
        $.each(map, function (key, value) {
            updateSeatingArrangementGroupBadge(key, (value * (-1)));
        });


    });
    $("#editTableModal").modal("hide");


}
function updateTablePosition(tableId, top, left) {
    Ajax.sendRequest(URLs.updateTablePosition, {
        data: {
            tableId: tableId,
            top: top,
            left: left
        }
    });
}


function moveGuestToGroup(guest) {
    var groupId = guest.data().group;
    //showGroupPill(groupId);
    $('#' + groupId + ' ul').append($(guest).clone());
    $(guest).remove();

}


function addEditTable(oid) {
    var title;
    var capacity;
    var newTopPosition = 0;
    var newLeftPosition = 0;
    if (oid == 0) {
        title = $("#title").val();
        capacity = $("#amount").val();
        var positionForNewTable = findFirstEmptyPlaceHolder();
        newTopPosition = getTablePositionInPercent(positionForNewTable, POSITION_TYPE.TOP);// calcPercent(positionForNewTable.top, containerHeight, false);
        newLeftPosition = getTablePositionInPercent(positionForNewTable, POSITION_TYPE.LEFT); // calcPercent(positionForNewTable.left, containerWidth, false);
    } else {
        title = $("#editTitle").val();
        capacity = $("#editAmount").val();
    }
    Ajax.sendRequest(URLs.addEditTable, {
        data: {
            title: title,
            capacity: capacity,
            tableOid: oid,
            newTopPosition: newTopPosition,
            newLeftPosition: newLeftPosition
        },
        params: {
            newTable: oid == 0,
            tableId: oid,
            title: title,
            capacity: capacity
        },
        contentType: 'application/json;charset=UTF-8',
        loader: true,
        callback: 'addEditTableResponse'
    });

}

function addEditTableResponse(response, params) {
    if (params.newTable) {
        $("#seatingArrangementTables").append(response.data);
        $("#title").val("");
        initSeatingArrangement();
    } else {
        var table = $('#table' + params.tableId);

        table.find('.table_title').text(params.title);
        table.find('.max_amount').text(params.capacity);

        $("#editTableModal").modal("hide");

    }
}

function openEditTableModel(tableId) {
    var table = $('#table' + tableId);

    $("#editTitle").val(table.find(".table_title").text());
    $("#editAmount").val(table.find(".max_amount").text());

    $('#editTableForm').attr('action', 'javascript:addEditTable(' + tableId + ')');
    $('#deleteTableBtn').attr('onclick', 'deleteTable(' + tableId + ')');

    $("#editTableModal").modal();
}

function closeOpenedTables() {
    $('[data-opened="1"]').each(function (i, element) {
        var openedTable = $(element);
        openedTable.removeClass("table_normal").addClass("table_small");
        openedTable.attr("data-opened", "0");

        //move the table to initial position {before been opened}
        openedTable.css({top: openedTable.data().top, left: openedTable.data().left});

    })

}


function openTable(tableId) {

    var justClose = ($('#table' + tableId).parent().attr("data-opened") == "1");
    closeOpenedTables();
    if (!justClose) {
        var table = $('#table' + tableId).parent();
        //var top = table.offset().top;
        var left = table.offset().left - table.width() / 2;


        table.removeClass("table_small").addClass("table_normal");

        //Normalize position - check boundaries
        var containerRight = container.offset().left + container.width();

        var tableRight = left + table.width();
        var delta = containerRight - tableRight;
        if (delta < 0) {
            left += delta;
        }
        if(left<0){
            left = container.position().left;
        }

        table.offset({left: left});
        table.attr("data-opened", "1");
    }

}

function onDropTable(droppedTable, placeHolder) {
    //var droppedTable = ui.draggable;
    var tableInPlaceholder = findTableByPlaceHolderPosition(placeHolder.position().top, placeHolder.position().left);
    if (tableInPlaceholder.length > 0) {
        $(tableInPlaceholder).animate({top: startPosition.top, left: startPosition.left}, "slaw");
    }
    //var container = $('#seatingArrangementTables');

    droppedTable.animate({top: placeHolder.position().top, left: placeHolder.position().left});
    droppedTable.offset({top: placeHolder.offset().top, left: placeHolder.offset().left});

    //var containerHeight = container.height();
    //var containerWidth = container.outerWidth();
    droppedTable.css("width", "");
    droppedTable.css("height", "");


    //calc new top and left position in percentage for dropped table
    var newTopPosition = getTablePositionInPercent(droppedTable.position(), POSITION_TYPE.TOP); //calcPercent(droppedTable.position().top, containerHeight, false);
    var newLeftPosition = getTablePositionInPercent(droppedTable.position(), POSITION_TYPE.LEFT); // calcPercent(droppedTable.position().left, containerWidth, true);

    //update init position of small_tables for dropped table
    droppedTable.data().top = newTopPosition + "%";
    droppedTable.data().left = newLeftPosition + "%";

    //send ajax request to update position in DB
    updateTablePosition(droppedTable.data().table, newTopPosition, newLeftPosition);

    if (tableInPlaceholder.length > 0) {
        //calc new top and left position in percentage for replaced table
        newTopPosition = getTablePositionInPercent(startPosition, POSITION_TYPE.TOP); //calcPercent(startPosition.top, containerHeight, false);
        newLeftPosition = getTablePositionInPercent(startPosition, POSITION_TYPE.LEFT); //calcPercent(startPosition.left, containerWidth, true);

        //update init position of small_tables for replaced table
        $(tableInPlaceholder).data().top = newTopPosition + "%";
        $(tableInPlaceholder).data().left = newLeftPosition + "%";

        //send ajax request to update position in DB
        updateTablePosition($(tableInPlaceholder).data().table, newTopPosition, newLeftPosition);
    }

}

function findTableByPlaceHolderPosition(top, left) {
    return $("#seatingArrangementTables")
        .find(".draggable")
        .filter(function () {
            return Math.abs($(this).position().top - top) < 3
                &&
                Math.abs($(this).position().left - left) < 3;


        });
}

function findFirstEmptyPlaceHolder() {
    var freePlaceHolderPosition;
    $("#seatingArrangementTables").find(".droppable").each(function (i, placeHolder) {
        var placeHolderPosition = $(placeHolder).position();
        var tableInPlaceholder = findTableByPlaceHolderPosition(placeHolderPosition.top, placeHolderPosition.left);
        if (tableInPlaceholder.length == 0) {
            freePlaceHolderPosition = placeHolderPosition;
            return false;
        }
    });

    return freePlaceHolderPosition;

}


function handleGroupsContainerMinimize(elem) {
    var panelBody = $('#groupsContainer').find('.panel-body');
    panelBody.toggle("blind", {}, 500);

    var icon = $(elem);
    if (icon.hasClass("fa-plus-square")) {
        icon.switchClass("fa-plus-square", "fa-minus-square", 1000);

    } else {
        icon.switchClass("fa-minus-square", "fa-plus-square", 1000);

    }
}

function getTablePositionInPercent(position, type) {
    if (type == POSITION_TYPE.TOP) {
        return calcPercent(position.top, containerHeight, false)
    }
    if (type == POSITION_TYPE.LEFT) {
        return calcPercent(position.left, containerWidth, true)
    }
}