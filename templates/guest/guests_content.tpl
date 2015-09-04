<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-table fa-fw"></i> מוזמנים
        <div class="pull-left">
            <div class="dropdown">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        יצוא
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left" role="menu" style="min-width: 0px">
                        <li class="cursor-pointer">
                            <a onclick="report('{$loc}')">
                            <span class="fa fa-file-excel-o fa-fw">
                            </span>
                                אקסל
                            </a>
                        </li>

                    </ul>
            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="padding: 0px">
        {*<div class="row">*}
                    {*<div class="col-lg-12">*}


                <div class="table-responsive">
                    <table id="guestsTable" class="display" >
                        {*<div class="dataTable_wrapper">*}

                        {*<table id="guestsTable" class="table table-striped table-bordered table-hover">*}
                        <thead>

                        <tr>
                            {*{if $loc eq 'guests'}*}
                            <th></th>
                            {*{/if}*}
                            <th>שם</th>
                            {if $loc neq 'invitations'}
                                <th>מוזמנים</th>
                                <th>טלפון</th>
                            {/if}
                            <th>צד</th>
                            <th>קבוצה</th>
                            {if $loc neq 'guests'}
                                {if $loc eq 'invitations' or $loc eq 'search' }
                                    <th>נשלחה הזמנה</th>
                                {/if}
                                {if $loc eq 'rsvps' or $loc eq 'search' }
                                    <th>אישור הגעה</th>
                                {/if}
                            {/if}
                            {if $loc eq 'guests' or  $loc eq 'search'}
                                <th>מתנה</th>
                            {/if}
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $guests as $guest}
                            {include file="guest/guest_content.tpl"}
                        {/foreach}
                        </tbody>
                        <script>
                            var table = $('#guestsTable').DataTable({
//                                "columnDefs": [
//                                    { className: "dt-body-center", "targets": "_all" }
//                                ],

                                "aoColumnDefs": [
                                    { 'bSortable' : false, 'aTargets': [0]}
                                ],
                                "order": [[1, "asc"]]
                            });

                            //                            var tt = new $.fn.dataTable.TableTools(table, {
                            ////                       tableTools: {
                            //                                "aButtons": [
                            //                                    {
                            //                                        "sExtends": "xls",
                            //                                        "sButtonText": "יצא לאקסל"
                            //                                    },
                            //
                            //
                            //                                    {
                            //                                        "sExtends": "copy",
                            //                                        "sButtonText": "העתק"
                            //                                    }
                            //
                            //                                ]
                            ////                       }
                            //                            });
                            //
                            //                            $(tt.fnContainer()).insertBefore('#guestsContent');

                        </script>
                    </table>
                </div>
                <!-- /.table-responsive -->
            {*</div>*}
            <!-- /.col-lg-4 (nested) -->

            <!-- /.col-lg-8 (nested) -->
        {*</div>*}
        <!-- /.row -->
    </div>
    <!-- /.panel-body -->
</div>

