<div class="panel panel-green">
    <div class="panel-heading">
        <i class="fa fa-group fa-fw"></i> יצירת קבוצה חדשה
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="newGroupForm" role="form" action="javascript:createGroup()" autocomplete="off">
            <div class="form-group has-feedback">
                <input class="form-control" required placeholder="שם הקבוצה" id="group_name" name="group_name">
                <span style="top: 0" class="fa form-control-feedback icon"></span>
            </div>

            <button class="btn btn-success btn-lg btn-block" type="submit">
                צור
            </button>
        </form>

    </div>
</div>

<script>
    var newGroupFormValidator = $('#newGroupForm').validate();
</script>
