<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-28 12:15:09
         compiled from "..\templates\edit_guest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238425513d5b38fc790-26613822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f68ad8a1bfd80811046d0412803ddad35471c81' => 
    array (
      0 => '..\\templates\\edit_guest.tpl',
      1 => 1427541307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238425513d5b38fc790-26613822',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5513d5b391bba8_43816325',
  'variables' => 
  array (
    'sides' => 0,
    'value' => 0,
    'groups' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5513d5b391bba8_43816325')) {function content_5513d5b391bba8_43816325($_smarty_tpl) {?><div id="edit_guest" style="display: none" title="עריכת מוזמן">
    <div id="site_content_small" style="float:left">
        <div style="float:right; padding-right:40px">
            <table id="add_new_guest_table" width="400" class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="padding: 5px; font-weight: bolder; margin:10px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם פרטי:</td>
                    <td align="right" valign="middle"><input id="editName" type="text" class="leadnews"
                                                             style="height:15px"/></td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">שם משפחה:</td>
                    <td align="right" valign="middle"><input id="editLastName"  type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">טלפון:</td>
                    <td align="right" valign="middle"><input id="editPhone" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">צד:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="editSides" class="widthRegister">
                            
                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">קבוצה:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="editGroups" class="widthRegister">
                            
                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
                            <?php } ?>
                        </select>
                        

                    </td>

                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">מספר מוזמנים:</td>
                    <td align="right" valign="middle"><input id="editAmount" type="text" value="1"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<?php echo '<script'; ?>
 type="text/javascript">
    var editGuestDialog;
    $(function () {

        editGuestDialog = $("#edit_guest").dialog({
            autoOpen: false,
            height: 460,
            width: 550,
            modal: true,
            close: function () {
            }
        })
        ;
    })
    ;
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("create_new_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
