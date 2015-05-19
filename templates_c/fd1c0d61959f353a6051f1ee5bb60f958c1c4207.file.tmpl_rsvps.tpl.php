<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 20:29:05
         compiled from "..\templates\tmpl_rsvps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:332654ccb91b398ea9-43904798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd1c0d61959f353a6051f1ee5bb60f958c1c4207' => 
    array (
      0 => '..\\templates\\tmpl_rsvps.tpl',
      1 => 1427365455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '332654ccb91b398ea9-43904798',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54ccb91b3d3832_60808197',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ccb91b3d3832_60808197')) {function content_54ccb91b3d3832_60808197($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
