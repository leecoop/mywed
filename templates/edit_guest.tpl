<div class="modal fade" id="editGuestModal" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content modal-primary">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
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
                        <button id="editInvitationSent" title="Mark this guest as accepted" class="btn btn-circle" style="border-color: #4cae4c" type="button" onclick="toggleInvitationSentClass('editInvitationSent')">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>

                    <div class="form-group">
                        <label>אישר הגעה</label>
                        <div class="btn-group" id="ediArrivalApproved">
                            <button val="1" onClass="btn-success" title="Mark this guest as accepted" class="btn  btn-circle" type="button" onclick="toggleArrivalApprovedClass('ediArrivalApproved',1)">
                                <i class="fa fa-check"></i>
                            </button>
                            <button val="0" onClass="btn-warning" title="Mark this guest as accepted" class="btn  btn-circle" type="button" onclick="toggleArrivalApprovedClass('ediArrivalApproved',0)">
                                <i class="fa fa-question"></i>
                            </button>
                            <button val="2" onClass="btn-danger" title="Mark this guest as accepted" class="btn  btn-circle" type="button" onclick="toggleArrivalApprovedClass('ediArrivalApproved',2)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
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
