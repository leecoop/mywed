<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-19 22:55:41
         compiled from "..\templates\guests_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3157854b8edba29b0e7-01447454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '689f6d16829d1b495b4cd65a54aafe20e64814c9' => 
    array (
      0 => '..\\templates\\guests_content.tpl',
      1 => 1432068939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3157854b8edba29b0e7-01447454',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b8edba2a6c67_22586487',
  'variables' => 
  array (
    'count' => 0,
    'loc' => 0,
    'guests' => 0,
    'total' => 0,
    'guest' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8edba2a6c67_22586487')) {function content_54b8edba2a6c67_22586487($_smarty_tpl) {?><div id="guestsArea">
    <fieldset class="border1 padd5 bg3 border_radius">
        <legend align="center" class="seperator1 font18" dir="rtl"><h5>סך הכל : <span id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span></h5>
        </legend>
        <div id="guestsContent CSSTableGenerator" dir="rtl">
            <table class=" maxWidth">
                <tr>
                    <th></th>
                    <th>שם</th>
                    <th>שם משפחה</th>
                    <th>מוזמנים</th>
                    <th>טלפון</th>
                    <th>צד</th>
                    <th>קבוצה</th>
                    <?php if ($_smarty_tpl->tpl_vars['loc']->value!='guests') {?>
                        <?php if ($_smarty_tpl->tpl_vars['loc']->value=='invitations'||$_smarty_tpl->tpl_vars['loc']->value=='search') {?>
                            <th>נשלחה הזמנה</th>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['loc']->value=='rsvps'||$_smarty_tpl->tpl_vars['loc']->value=='search') {?>
                            <th>אישור הגעה</th>
                        <?php }?>
                    <?php }?>
                </tr>

                <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['guest'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['guest']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guests']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['guest']->key => $_smarty_tpl->tpl_vars['guest']->value) {
$_smarty_tpl->tpl_vars['guest']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['guest']->value['amount'], null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("guest_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php } ?>
                <?php echo '<script'; ?>
>
                    updateStatisticPanel(<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
);
                <?php echo '</script'; ?>
>
            </table>
        </div>
    </fieldset>
</div><?php }} ?>
