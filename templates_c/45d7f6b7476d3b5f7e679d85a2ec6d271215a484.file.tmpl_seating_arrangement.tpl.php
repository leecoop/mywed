<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-28 11:53:55
         compiled from "..\templates\tmpl_seating_arrangement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:244905506b4e6137364-04232375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45d7f6b7476d3b5f7e679d85a2ec6d271215a484' => 
    array (
      0 => '..\\templates\\tmpl_seating_arrangement.tpl',
      1 => 1427540034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244905506b4e6137364-04232375',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5506b4e6185579_34536723',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5506b4e6185579_34536723')) {function content_5506b4e6185579_34536723($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<body dir="rtl" bgcolor="#F8F8F8">
<div id="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="site_content">
        
        <?php echo $_smarty_tpl->getSubTemplate ("seating_arrangement_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
