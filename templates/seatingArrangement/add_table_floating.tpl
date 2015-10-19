<button class="btn btn-primary btn-circle btn-lg floatingBtn" type="button"
        onclick="toggleFloatingAddTable()">
    <i class="fa fa-plus"></i>
</button>

<div id="floatingAddTablePanel" class="floatingPanel">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-group fa-fw"></i> הוספת שולחן
            <button type="button" class="close" onclick="toggleFloatingAddTable()"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">

    {include file="seatingArrangement/add_table_form.tpl"}


        </div>


    </div>

    <script>
        $('#addTableForm').validate();
    </script>

</div>