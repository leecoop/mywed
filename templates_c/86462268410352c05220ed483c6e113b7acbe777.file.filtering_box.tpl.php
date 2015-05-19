<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-16 21:57:15
         compiled from "..\templates\filtering_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:827754c55573dee4c3-53960820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86462268410352c05220ed483c6e113b7acbe777' => 
    array (
      0 => '..\\templates\\filtering_box.tpl',
      1 => 1431806233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '827754c55573dee4c3-53960820',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c55573e2b3c6_89710633',
  'variables' => 
  array (
    'sides' => 0,
    'loc' => 0,
    'value' => 0,
    'groups' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c55573e2b3c6_89710633')) {function content_54c55573e2b3c6_89710633($_smarty_tpl) {?><div class="filter_box_div">


    <div id="site_content_small">
        <div class="box_title">
            <div class="title_text">סינון</div>
        </div>
        <div style="float:right; padding-right:10px">

            <table class="maxWidth">
                <tbody>
                <tr>

                    <td valign="top" style="padding-left: 30px; border-left: 1px solid rgb(222, 222, 222);">
                        <div class="marginB10">צד(<a onclick="toggleCheckboxes(this,'filterSides');" class="underline" href="javascript:void(0);">כלום</a>)</div>
                        <div id="filterSides">
                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->index++;
?>
                                <input type="checkbox" class="margin3" onclick="filter('<?php echo $_smarty_tpl->tpl_vars['loc']->value;?>
')" id="side_<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
">
                                <label for="side_<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</label>
                                <br>
                            <?php } ?>
                        </div>

                    </td>

                    <td valign="top" style="padding-right:30px">
                        <div class="marginB10">קבוצה(<a onclick="toggleCheckboxes(this,'filterGroups');" class="underline" href="javascript:void(0);">כלום</a>)
                            <img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()" style="margin: -4px;padding-right: 4px">
                        </div>
                        <div style="max-height: 110px; overflow-y: scroll;direction: ltr;">
                            <div style="direction: rtl">
                                <div id="filterGroups">
                                    <table>
                                        <tr>
                                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->index++;
?>
                                            <td style="padding: 0">
                                                <input type="checkbox" style="margin:3px 5px 3px 3px" id="group_<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" onclick="filter('<?php echo $_smarty_tpl->tpl_vars['loc']->value;?>
')" value="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
">
                                                <label for="group_<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</label>
                                            </td>
                                            <?php if ($_smarty_tpl->tpl_vars['value']->index%3==0) {?>
                                            
                                        </tr>
                                        <tr>
                                            <?php }?>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </tr>

                </tbody>
            </table>
            <div style="float: left; cursor: pointer;">
                <img id="xls" class="xls" onclick="report('<?php echo $_smarty_tpl->tpl_vars['loc']->value;?>
')"/>
                <label for="xls">יצוא לאקסל</label>
            </div>



        </div>
    </div>
</div>





<?php }} ?>
