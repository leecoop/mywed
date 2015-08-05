<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-table fa-fw"></i> מוזמנים
        <div class="pull-left">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    יצוא
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a onclick="report('{$loc}')">
                            <span class="fa fa-file-excel-o fa-fw">
                            </span>
                            אקסל
                        </a>
                    </li>
                    {*<li><a href="#">Another action</a>*}
                    {*</li>*}
                    {*<li><a href="#">Something else here</a>*}
                    {*</li>*}
                    {*<li class="divider"></li>*}
                    {*<li><a href="#">Separated link</a>*}
                    {*</li>*}
                </ul>
            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                {*<div class="table-responsive">*}
                <table id="guestsTable" class="display"  >
                {*<div class="dataTable_wrapper">*}

                {*<table id="guestsTable" class="table table-striped table-bordered table-hover">*}
                        <thead>

                        <tr>
                            {if $loc eq 'guests'}
                                <th></th>
                            {/if}
                            <th>שם</th>
                            <th>מוזמנים</th>
                            <th>טלפון</th>
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
                        </tr>
                        </thead>
                        {$total = 0}
                        <tbody>

                        {foreach $guests as $guest}
                            {$total = $total + $guest.amount}
                            {include file="guest_content.tpl"}
                        {/foreach}
                        </tbody>
                        <script>
                            var table = $('#guestsTable').DataTable({
//                                "columnDefs": [
//                                    { className: "dt-body-center", "targets": "_all" }
//                                ],
                                "pageLength": 15,
                                "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "הכל"]],
                                "dom": 'frtip',
                                "aoColumnDefs": [
                                    { 'bSortable': false, 'aTargets': [ 0 ] }
                                ],
                                "order": [[ 1, "asc" ]],

                                "language": {
                                    "lengthMenu": "תוצאות בעמוד _MENU_",
                                    "zeroRecords": "אין תוצאות חיפוש",
                                    "info": "עמוד _PAGE_ מתוך _PAGES_",
                                    "infoEmpty": "לא נמצאו תוצאות חיפוש",
                                    "infoFiltered": "",
                                    "search": "חיפוש:",
                                    "paginate": {
                                        "next": "הבא",
                                        "previous": "קודם"
                                    }
                                }
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

                            updateStatisticPanel({$total});
                        </script>
                    </table>
                {*</div>*}
                <!-- /.table-responsive -->
            </div>
            <!-- /.col-lg-4 (nested) -->

            <!-- /.col-lg-8 (nested) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.panel-body -->
</div>

