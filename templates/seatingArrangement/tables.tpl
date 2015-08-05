<div id="tables">
    {foreach $tables as $table}
        {include file="seatingArrangement/table.tpl"}
    {/foreach}
</div>

<div id="editTableModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ערוך פרטי שולחן</h4>
            </div>
            <div class="modal-body">
                <form id="editTableForm" role="form" autocomplete="off">
                    <div class="form-group">
                        <label for="editTitle">שם שולחן</label>
                        <input class="form-control" id="editTitle" required>
                    </div>

                    <div class="form-group">
                        <label for="editAmount">גודל שולחן</label>
                        <input class="form-control" id="editAmount">
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                    <input type="submit" class="btn btn-default" onclick="$('#editTableForm').submit()" value="עדכן"/>
                    <button type="button" class="btn btn-default" id="deleteTableBtn">מחק</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">סגור</button>
            </div>
        </div>

    </div>
</div>
{*<script>*}
{*$(function() {*}
{*$( ".panel-green" ).draggable();*}
{*});*}
{*</script>*}