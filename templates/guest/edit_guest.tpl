<div class="modal fade" id="editGuestModal" role="dialog" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog modal-sm">

        <div class="modal-content modal-primary">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">עריכת מוזמן</h4>

            </div>
            <div class="modal-body" style="padding: 20px 15px 0">
                <form id="editGuestForm" role="form" autocomplete="off">
                    <div class="form-group">
                        <label for="editName">שם</label>
                        <input class="form-control" id="editName" required>
                    </div>

                    <div class="form-group">
                        <div class="form-group col-xs-6" style="padding-right: 0;padding-left: 7px">
                            <label>טלפון</label>
                            <input class="form-control" id="editPhone">
                        </div>

                        <div class="form-group col-xs-6" style="padding-left: 0;padding-right: 5px">
                            <label for="editAmount">מספר מוזמנים</label>
                            <div class="form-group text-center">

                                <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(1, this)"><i
                                            class="fa  fa-plus"></i></button>
                                <input id="editAmount" value="1" readonly class="form-control" data-type="amount"
                                       style="width:60px; text-align: center; display:inline;cursor:default;background-color: #fff"/>
                                <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(-1, this)"><i
                                            class="fa fa-minus"></i></button>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 form-group" style="padding-right: 0;padding-left: 7px">
                            <label for="editSides">צד</label>
                            <select id="editSides" class="form-control">
                                {foreach $sides as $value}
                                    <option value="{$value@key}">{$value}</option>
                                {/foreach}
                            </select>
                        </div>

                        <div class="col-xs-7 form-group" style="padding-left: 0;padding-right: 5px">
                            <label for="editGroups">קבוצה</label>
                            <select id="editGroups" class="form-control" data-type="groups">
                                {foreach $groups as $value}
                                    <option value="{$value@key}">{$value}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="editInvitationSent">נשלחה הזמנה</label>
                        <button id="editInvitationSent" title="Mark this guest as accepted" class="btn btn-circle" style="border-color: #4cae4c" type="button"
                                onclick="toggleInvitationSentClass('editInvitationSent')">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>

                    <div class="form-group">
                        <label>אישר הגעה</label>

                        <div class="btn-group" id="ediArrivalApproved">
                            <button val="1" onClass="btn-success" title="Mark this guest as accepted" class="btn  btn-circle" type="button"
                                    onclick="toggleArrivalApprovedClass('ediArrivalApproved',1)">
                                <i class="fa fa-check"></i>
                            </button>
                            <button val="2" onClass="btn-warning" title="Mark this guest as accepted" class="btn  btn-circle" type="button"
                                    onclick="toggleArrivalApprovedClass('ediArrivalApproved',2)">
                                <i class="fa fa-question"></i>
                            </button>
                            <button val="3" onClass="btn-danger" title="Mark this guest as accepted" class="btn  btn-circle" type="button" onclick="toggleArrivalApprovedClass('ediArrivalApproved',3)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editTables">שולחן</label>
                        <select id="editTables" class="form-control" data-placeholder="בחר שולחן">
                            {foreach $tables as $table}
                                <option value="{$table.oid}">{$table.title}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group">
                        <label>מתנה</label>
                        <div class="input-group">
                            <input class="form-control" id="editGift" aria-describedby="giftAddon">
                            <span class="input-group-addon" id="giftAddon"><i class="fa fa-gift"></i></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="$('#editGuestForm').submit()"><i class="fa fa-floppy-o"></i> עדכן</button>
                <button type="button" class="btn btn-danger" id="deleteGuestBtn">מחק</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">סגור</button>
            </div>
        </div>

    </div>
</div>
<script>
    var editGuestFormValidator = $('#editGuestForm').validate();
</script>
