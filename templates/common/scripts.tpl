<script src="../js/angular.min.js"></script>


<!-- jQuery Version 1.11.0 -->
<script src="../js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
{*<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>*}

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../js/plugins/raphael-min.js"></script>
{*<script src="../js/plugins/morris.js"></script>*}
{*<script src="../js/plugins/morris-data.js"></script>*}

<!-- Custom Theme JavaScript -->
<script src="../js/sb-admin-2.js"></script>


<script src="../js/main.js"></script>
{if $loc eq 'seating_arrangement'}
    <script src="../js/seatingArrangement.js"></script>
{/if}

{if $loc eq 'seating'}
    <script src="../js/seating.js"></script>
{/if}

<!-- DataTables JavaScript -->
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.dataTables.js"></script>
<script>
    $.extend( true, $.fn.dataTable.defaults, {
        "pageLength": 15,
        "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "הכל"]],
        "dom": 'frtip',
        "language": {
            "sProcessing": "מעבד...",
            "sLengthMenu": "הצג _MENU_ פריטים",
            "sZeroRecords": "לא נמצאו רשומות מתאימות",
            "sEmptyTable": "לא נמצאו רשומות מתאימות",
            "sInfo": "_START_ עד _END_ מתוך _TOTAL_ רשומות",
            "sInfoEmpty": "0 עד 0 מתוך 0 רשומות",

            "sInfoFiltered": "(מסונן מסך _MAX_  רשומות)",
            "sInfoPostFix": "",
            "sSearch": "חפש:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "ראשון",
                "sPrevious": "קודם",
                "sNext": "הבא",
                "sLast": "אחרון"
            }
        }
    } );
</script>
{*<script type="text/javascript" language="javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>*}
{*<script type="text/javascript" language="javascript" src="../js/plugins/dataTables.tableTools.js"></script>*}
<script type="text/javascript" language="javascript" src="../js/plugins/dataTables.plugins.js"></script>



<script src="../js/jquery-ui.js"></script>
<script src="../js/plugins/jquery.ui.touch-punch.min.js"></script>

<script src="../js/plugins/justgage.1.0.1.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.countdown.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.validate.js"></script>
<script>
    jQuery.validator.setDefaults({
        errorElement: "em",
        errorClass: "has-error",
//        validClass: "has-success",
        highlight: function (element, errorClass, validClass) {
            $(element).parent('div').addClass(errorClass).removeClass(validClass);
            $(element).nextAll('.form-control-feedback').addClass('fa-times');
//            .removeClass('fa-check text-success');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent('div').removeClass(errorClass).addClass(validClass);
            //resetForm case
            if (validClass === "") {
                $(element).nextAll('.form-control-feedback').removeClass('fa-times fa-check')
            } else {
                $(element).nextAll('.form-control-feedback').removeClass('fa-times');
//                        .addClass('fa-check text-success');

            }
        }

    });
</script>
<script type="text/javascript" language="javascript" src="../js/plugins/localization/messages_he.js"></script>
<script type="text/javascript" language="javascript" src="../js/translationMap.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.PrintArea.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/notify.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/chosen.jquery.js"></script>

{*<script src="https://cdn.rawgit.com/AndreaLombardo/BootSideMenu/master/js/BootSideMenu.js"></script>*}

