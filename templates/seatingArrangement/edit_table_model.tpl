<div id="editTableModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content modal-primary">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
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

                        <div class="form-group">
                            <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(1, this)"><i
                                        class="fa fa-plus"></i></button>
                            <input id="editAmount" readonly class="form-control" data-type="amount"
                                   style="width:80px; text-align: center; display:inline;cursor:default;background-color: #fff"/>
                            <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(-1, this)"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="$('#editTableForm').submit()"><i class="fa fa-floppy-o"></i> עדכן</button>
                <button type="button" class="btn btn-danger" id="deleteTableBtn"><i class="fa fa-trash-o"></i> מחק</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> סגור</button>
            </div>
        </div>

    </div>
</div>