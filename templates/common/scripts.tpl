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

<!-- DataTables JavaScript -->
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.dataTables.js"></script>
{*<script type="text/javascript" language="javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>*}
{*<script type="text/javascript" language="javascript" src="../js/plugins/dataTables.tableTools.js"></script>*}
<script type="text/javascript" language="javascript" src="../js/plugins/dataTables.plugins.js"></script>



<script src="../js/jquery-ui.js"></script>

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
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.bootstrap-growl.js"></script>
<script type="text/javascript" language="javascript" src="../js/plugins/jquery.slick.2.1.js"></script>
{*<script type="text/javascript" language="javascript" src="../js/plugins/bootstrap-notify.min.js"></script>*}

{*<script src="https://cdn.rawgit.com/AndreaLombardo/BootSideMenu/master/js/BootSideMenu.js"></script>*}

