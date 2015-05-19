<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-19 23:19:34
         compiled from "..\templates\guest_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:858754b8edba2b6668-22773747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd2121c04db6c6c351730d2b523d9bf7e87e58a4' => 
    array (
      0 => '..\\templates\\guest_content.tpl',
      1 => 1432070373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '858754b8edba2b6668-22773747',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b8edba304875_92346092',
  'variables' => 
  array (
    'guest' => 0,
    'sides' => 0,
    'groups' => 0,
    'loc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8edba304875_92346092')) {function content_54b8edba304875_92346092($_smarty_tpl) {?><tr id="guest<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
">
    <td class="edit" onclick='openEditGuest("<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
")'></td>
    <td name="<?php echo $_smarty_tpl->tpl_vars['guest']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['guest']->value['name'];?>
</td>
    <td last_name="<?php echo $_smarty_tpl->tpl_vars['guest']->value['last_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['guest']->value['last_name'];?>
</td>
    <td amount="<?php echo $_smarty_tpl->tpl_vars['guest']->value['amount'];?>
"><?php echo $_smarty_tpl->tpl_vars['guest']->value['amount'];?>
</td>
    <td phone="<?php echo $_smarty_tpl->tpl_vars['guest']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['guest']->value['phone'];?>
</td>
    <td side="<?php echo $_smarty_tpl->tpl_vars['guest']->value['side_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sides']->value[$_smarty_tpl->tpl_vars['guest']->value['side_id']];?>
</td>
    <td group="<?php echo $_smarty_tpl->tpl_vars['guest']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->tpl_vars['guest']->value['group_id']];?>
</td>
    <?php if ($_smarty_tpl->tpl_vars['loc']->value!='guests') {?>
        <?php if ($_smarty_tpl->tpl_vars['loc']->value=='invitations'||$_smarty_tpl->tpl_vars['loc']->value=='search') {?>
            <td>
                <a id="invitationSent<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
" title="Mark this guest as accepted" invitationSent="<?php echo $_smarty_tpl->tpl_vars['guest']->value['invitation_sent'];?>
"
                   class="<?php if ($_smarty_tpl->tpl_vars['guest']->value['invitation_sent']==1) {?>checkOn<?php } else { ?>checkOff<?php }?>" onclick="updateInvitationSent(<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];
if ($_smarty_tpl->tpl_vars['loc']->value=='invitations') {?>,true<?php }?>);"
                   href="javascript:void(0)"></a>
            </td>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['loc']->value=='rsvps'||$_smarty_tpl->tpl_vars['loc']->value=='search') {?>
            <td>
        <span id="arrivalApproved<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
">
                        <a val="1" onClass="checkOn" offClass="checkOff" title="Mark this guest as accepted" class="<?php if ($_smarty_tpl->tpl_vars['guest']->value['arrival_approved']==1) {?>checkOn<?php } else { ?>checkOff<?php }?>"
                           onclick="updateArrivalApproved(<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
,1<?php if ($_smarty_tpl->tpl_vars['loc']->value=='rsvps') {?>,true<?php }?>);" href="javascript:void(0)"></a>
            <?php if ($_smarty_tpl->tpl_vars['loc']->value!='rsvps') {?>
                <a val="0" onClass="questionOn" offClass="questionOff" title="Mark this guest as not responded" class="<?php if ($_smarty_tpl->tpl_vars['guest']->value['arrival_approved']==0) {?>questionOn<?php } else { ?>questionOff<?php }?>"
                   onclick="updateArrivalApproved(<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
,0);" href="javascript:void(0)"></a>
            <?php }?>
            <a val="2" onClass="xOn" offClass="xOff" title="Mark this guest as declined" class="<?php if ($_smarty_tpl->tpl_vars['guest']->value['arrival_approved']==2) {?>xOn<?php } else { ?>xOff<?php }?>"
               onclick="updateArrivalApproved(<?php echo $_smarty_tpl->tpl_vars['guest']->value['oid'];?>
,2<?php if ($_smarty_tpl->tpl_vars['loc']->value=='rsvps') {?>,true<?php }?>);" href="javascript:void(0)"></a>
                    </span>
            </td>
        <?php }?>
    <?php }?>
</tr><?php }} ?>
