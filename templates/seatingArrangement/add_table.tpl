<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-group fa-fw"></i> הוספת שולחן
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="addTableForm" role="form" action="javascript:addEditTable(0)" autocomplete="off">

            <div class="form-group">
                <input class="form-control" name="title" required placeholder="שם שולחן" id="title">
            </div>

            <div class="form-group">
                <label>גודל שולחן</label>

                <div class="form-group">
                    <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(1, this)"><i
                                class="fa  fa-plus"></i></button>
                    <input id="amount" name="amount" value="12" class="form-control" readonly
                           style="width:60px; text-align: center; display:inline;cursor:default;background-color: #fff"/>
                    <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(-1, this)"><i
                                class="fa fa-minus"></i></button>
                </div>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">
                הוסף שולחן
            </button>

        </form>

    </div>
</div>

<script>
    $('#addTableForm').validate();
</script>