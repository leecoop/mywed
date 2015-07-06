<div id="create_new_group" style="display: none" title="הוספת קבוצה חדשה">
    <div class="site_content_small" style="float:left">
        <div style="float:right; padding-right:40px">
            <table width="400" class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="padding: 5px; font-weight: bolder; margin:10px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם:</td>
                    <td align="right" valign="middle"><input id="group_name" name="group_name" type="text" class="leadnews" style="height:15px"/></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<script type="text/javascript">
    var createGroupDialog;

    $(function () {

        createGroupDialog = $("#create_new_group").dialog({
            autoOpen: false,
            height: 205,
            width: 550,
            modal: true,
            buttons: {
                "בטל": closeCreateGroupDialog,
                "צור": createGroup


            },
            close: function () {
//            form[ 0 ].reset();
//            allFields.removeClass( "ui-state-error" );
            }
        })
        ;

//        $("#add_group_btn").click(function () {
//            createGroupDialog.dialog("open");
//        });
    })
    ;
</script>
