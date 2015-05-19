<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-25 20:34:21
         compiled from "..\templates\add_new_guest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2109654b8edba31bf84-63790355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aa24f828f6e09c4772dd9860ed68567d5d2ad0c' => 
    array (
      0 => '..\\templates\\add_new_guest.tpl',
      1 => 1427312059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2109654b8edba31bf84-63790355',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b8edba33f206_71803928',
  'variables' => 
  array (
    'sides' => 0,
    'value' => 0,
    'groups' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8edba33f206_71803928')) {function content_54b8edba33f206_71803928($_smarty_tpl) {?><div id="add_new_guest" style="display: none" title="הוספת מוזמן חדש">
    <div id="site_content_small" style="float:left">
        <div style="float:right; padding-right:40px">
            <table id="add_new_guest_table" width="400" class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="padding: 5px; font-weight: bolder; margin:10px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם פרטי:</td>
                    <td align="right" valign="middle"><input id="name" name="name" type="text" class="leadnews"
                                                             style="height:15px"/></td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">שם משפחה:</td>
                    <td align="right" valign="middle"><input id="lastName" name="lastName" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">טלפון:</td>
                    <td align="right" valign="middle"><input id="phone" name="phone" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">צד:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="sides" name="sides" class="widthRegister">
                            
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
                        <select style="height:25px" id="groups" name="groups" class="widthRegister">
                            
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
                        <img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()">

                    </td>

                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">מספר מוזמנים:</td>
                    <td align="right" valign="middle"><input id="amount" name="amount" type="text" value="1"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<?php echo '<script'; ?>
 type="text/javascript">
    var addGuestDialog;
    $(function () {

        addGuestDialog = $("#add_new_guest").dialog({
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
