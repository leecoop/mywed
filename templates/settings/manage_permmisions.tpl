<div class="col-md-8">
    <h3><span class="fa fa-key pLeft5"></span>ניהול הרשאות</h3>

    <div class="panel panel-default">
        <div class="panel-body" style="padding: 0px">
            <div class="table-responsive">
                <table id="permissionsTable" class="display">
                    <thead>
                    <tr>
                        <th>שם משתמש</th>
                        <th>פעיל</th>
                        <th>הרשאת מנהל</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    {if isset($shearedPermissions)}
                        {foreach $shearedPermissions as $permission}
                            <tr>
                                <td>{$permission.userEmail}</td>
                                <td>{$permission.active}</td>
                                <td>{$permission.isMater}</td>
                                <td></td>
                            </tr>
                        {/foreach}
                    {/if}
                    </tbody>
                    <script>
                        var table = $('#permissionsTable').DataTable({
                            "pageLength": 10

                        });

                    </script>
                </table>
            </div>
        </div>
    </div>
</div>