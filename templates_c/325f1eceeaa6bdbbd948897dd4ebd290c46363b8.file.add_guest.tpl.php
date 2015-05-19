<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-28 00:15:01
         compiled from "..\templates\add_guest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307795513ce18afacf9-42312729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325f1eceeaa6bdbbd948897dd4ebd290c46363b8' => 
    array (
      0 => '..\\templates\\add_guest.tpl',
      1 => 1427498100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307795513ce18afacf9-42312729',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5513ce18b1df78_91822672',
  'variables' => 
  array (
    'sides' => 0,
    'value' => 0,
    'groups' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5513ce18b1df78_91822672')) {function content_5513ce18b1df78_91822672($_smarty_tpl) {?>

    <div id="site_content_small" style="width: 870px; margin-bottom: 10px">
        <div class="box_title" style="width: 870px">
            <div class="title_text">חדש</div>
        </div>
        <div style="float:right;">
            <table id="add_guest_table"  class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="font-weight: bolder; margin:4px; width:865px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם:</td>
                    <td align="right" valign="middle"><input id="name" name="name" type="text" class="leadnews"/></td>

                    <td align="right" valign="middle" class="w3">שם משפחה:</td>
                    <td align="right" valign="middle"><input id="lastName" name="lastName" type="text" class="leadnews"/></td>
                    <td align="right" valign="middle" class="w3">מספר מוזמנים:</td>
                    <td align="right" valign="middle">
                        <input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(1)" value="+"/>
                        <input id="amount" name="amount" type="text" value="1" class="leadnews" style="width:25px; text-align: center;"/>
                        <input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(-1)" value="-"/></td>

                

                
                    <td align="right" valign="middle" class="w3">צד:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="sides" name="sides" class="selectField">
                            
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

                    <td align="right" valign="middle" class="w3">קבוצה:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="groups" name="groups" class="selectField">
                            
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


                    
                    

                    <td>
                        <input type="submit" style="width: 60px" id="add_new_guest_btn" onclick="addGuest()" class="largeOff" value="חדש"/>

                    </td>
                </tr>
            </table>
        </div>
    </div>





<?php }} ?>
