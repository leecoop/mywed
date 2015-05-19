<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-16 20:24:04
         compiled from "..\templates\common\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2842154b8edba1f3138-81594985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b73076678d667e141019c06b3ddbf21fcea961c' => 
    array (
      0 => '..\\templates\\common\\menu.tpl',
      1 => 1431786831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2842154b8edba1f3138-81594985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b8edba250d59_82518066',
  'variables' => 
  array (
    'loc' => 0,
    'statisticsMap' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8edba250d59_82518066')) {function content_54b8edba250d59_82518066($_smarty_tpl) {?><div id="menubar">
    <ul id="menu">
        
            
        
        
            
        
        
            
        
        
            
            
        
        <li <?php if ($_smarty_tpl->tpl_vars['loc']->value=='rsvps') {?> class="selected" <?php }?>>
            <span id="rsvpsCount" value='<?php echo $_smarty_tpl->tpl_vars['statisticsMap']->value["arrivalNotApproved"];?>
' class="countRedSmall"><?php echo $_smarty_tpl->tpl_vars['statisticsMap']->value["arrivalNotApproved"];?>
</span>
            <a href="rsvps.php">אישורי הגעה</a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['loc']->value=='invitations') {?> class="selected" <?php }?>>
            <span id="invitationsCount" value='<?php echo $_smarty_tpl->tpl_vars['statisticsMap']->value["invitationNotSent"];?>
' class="countRedSmall"><?php echo $_smarty_tpl->tpl_vars['statisticsMap']->value["invitationNotSent"];?>
</span>
            <a href="invitations.php">חלוקת הזמנות</a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['loc']->value=='search') {?> class="selected" <?php }?>>
            <a href="search.php">חיפוש</a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['loc']->value=='guests') {?> class="selected" <?php }?>>
            <a href="guests.php">מוזמנים</a>
        </li>
        
            
        

    </ul>
</div><?php }} ?>
