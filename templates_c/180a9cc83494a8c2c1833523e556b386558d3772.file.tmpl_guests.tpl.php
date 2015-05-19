<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-28 00:12:39
         compiled from "..\templates\tmpl_guests.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1031854b8edba0f52a8-89335061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '180a9cc83494a8c2c1833523e556b386558d3772' => 
    array (
      0 => '..\\templates\\tmpl_guests.tpl',
      1 => 1427497958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1031854b8edba0f52a8-89335061',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b8edba1434a1_16159287',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8edba1434a1_16159287')) {function content_54b8edba1434a1_16159287($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<body dir="rtl" bgcolor="#F8F8F8">
<div id="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div id="site_content">
        <?php echo $_smarty_tpl->getSubTemplate ("top_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("add_guest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("guests_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>
<?php echo $_smarty_tpl->getSubTemplate ("edit_guest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
