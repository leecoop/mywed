<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-26 11:26:07
         compiled from "..\templates\tmpl_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259454b902e902ca45-28280234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c674cc2384e73236966dc41cb2ed0793d950873d' => 
    array (
      0 => '..\\templates\\tmpl_search.tpl',
      1 => 1427365565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259454b902e902ca45-28280234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54b902e909a061_85652467',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b902e909a061_85652467')) {function content_54b902e909a061_85652467($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<body dir="rtl" bgcolor="#F8F8F8">
<div id="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="site_content">
        <div class="top_box_div">


            <div id="site_content_small">
                <div class="box_title">
                    <div class="title_text">חיפוש</div>
                </div>

                <div style="float:right; padding-right:40px">
                    <table style="padding:10px">

                        <tr>
                                                               
                            <td align="right">
                                <input style="width: 300px" type="text" id="search_text" name="search_text" dir="rtl"
                                       class="leadnews" onkeypress="searchKeyPress(event)"/>
                            </td>
                            <td>
                                <button id="search" onclick="search()" class="registerBtn">חפש</button>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


        <div id="searchContent">
            <fieldset class="border1 padd5 bg3 border_radius">
                <center>
                    <h5>אנא הזינו ערך לחיפוש</h5>
                </center>
            </fieldset>
        </div>
    </div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>

<?php echo $_smarty_tpl->getSubTemplate ("edit_guest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
