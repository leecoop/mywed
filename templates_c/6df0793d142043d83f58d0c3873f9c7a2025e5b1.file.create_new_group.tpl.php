<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-27 01:05:12
         compiled from "..\templates\create_new_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3033754b8edba356919-40483028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6df0793d142043d83f58d0c3873f9c7a2025e5b1' => 
    array (
      0 => '..\\templates\\create_new_group.tpl',
      1 => 1422317110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3033754b8edba356919-40483028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b8edba35e617_57019024',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8edba35e617_57019024')) {function content_54b8edba35e617_57019024($_smarty_tpl) {?><div id="create_new_group" style="display: none" title="הוספת קבוצה חדשה">
    <div id="site_content_small" style="float:left">
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
<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>
<?php }} ?>
