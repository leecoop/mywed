<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 11:24:34
         compiled from "..\templates\tmpl_invitations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2283454cbc2c1b625c7-13146097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c176b202d99a25239131799c46f81bcacd5b57b7' => 
    array (
      0 => '..\\templates\\tmpl_invitations.tpl',
      1 => 1427365455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2283454cbc2c1b625c7-13146097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cbc2c1bc7ed5_04052211',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cbc2c1bc7ed5_04052211')) {function content_54cbc2c1bc7ed5_04052211($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<body dir="rtl" bgcolor="#F8F8F8">
<div id="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="site_content">
        <?php echo $_smarty_tpl->getSubTemplate ("top_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("guests_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>
<?php echo $_smarty_tpl->getSubTemplate ("edit_guest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
