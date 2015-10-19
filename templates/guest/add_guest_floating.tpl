<button class="btn btn-primary btn-circle btn-lg floatingBtn" type="button"
        onclick="toggleFloatingAddGuest()">
    <i class="fa fa-user-plus"></i>
</button>

<div id="floatingAddGuestPanel" class="floatingPanel">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-user-plus fa-fw"></i> הוספת מוזמנים
            <button type="button" class="close" onclick="toggleFloatingAddGuest()"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            {include file="guest/add_guest_form.tpl"}
        </div>
    </div>
    <script>
        var addGuestFormValidator = $('#addGuestForm').validate();
    </script>
</div>