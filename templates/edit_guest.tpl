<div class="modal fade" id="editGuestModal" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">עריכת מוזמן</h4>

            </div>
            <div class="modal-body">
                <form id="editGuestForm" role="form" autocomplete="off">
                    <div class="form-group">
                        <label for="editName">שם</label>
                        <input class="form-control" id="editName" required>
                    </div>


                    <div class="form-group">
                        <label>טלפון</label>
                        <input class="form-control" id="editPhone">
                    </div>

                    <div class="form-group">
                        <label for="editSides">צד</label>
                        <select id="editSides" class="form-control">
                            {foreach $sides as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editGroups">קבוצה</label>
                        <select id="editGroups" class="form-control">
                            {foreach $groups as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editAmount">מספר מוזמנים</label>
                        <input class="form-control" id="editAmount" value="1">
                    </div>

                    <div class="form-group">
                        <label for="editInvitationSent">נשלחה הזמנה</label>
                        <a id="editInvitationSent" title="Mark this guest as accepted" invitationSent=""
                           href="javascript:void(0)"></a>
                    </div>

                    <div class="form-group">
                        <label>אישר הגעה</label>
        <span id="ediArrivalApproved">
    <a val="1" onClass="checkOn" offClass="checkOff"
       onclick="toggleArrivalApprovedClass('ediArrivalApproved',1)"
       title="Mark this guest as accepted" href="javascript:void(0)"></a>
    <a val="0" onClass="questionOn" offClass="questionOff"
       onclick="toggleArrivalApprovedClass('ediArrivalApproved',0)"
       title="Mark this guest as not responded"
       href="javascript:void(0)"></a>
    <a val="2" onClass="xOn" offClass="xOff"
       onclick="toggleArrivalApprovedClass('ediArrivalApproved',2)"
       title="Mark this guest as declined" href="javascript:void(0)"></a>
    </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit"  class="btn btn-default" onclick="$('#editGuestForm').submit()" value="עדכן" />
                <button type="button" class="btn btn-default" id="deleteGuestBtn">מחק</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">סגור</button>
            </div>
        </div>

    </div>
</div>
<script>
  var editGuestFormValidator = $('#editGuestForm').validate();
</script>
