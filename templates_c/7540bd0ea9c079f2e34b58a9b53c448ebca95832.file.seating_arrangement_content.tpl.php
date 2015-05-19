<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-28 12:02:35
         compiled from "..\templates\seating_arrangement_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142355506b4e619cc71-26083230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7540bd0ea9c079f2e34b58a9b53c448ebca95832' => 
    array (
      0 => '..\\templates\\seating_arrangement_content.tpl',
      1 => 1427540554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142355506b4e619cc71-26083230',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5506b4e61a0af2_51952545',
  'variables' => 
  array (
    'guestGroupedByGroup' => 0,
    'groups' => 0,
    'group' => 0,
    'guest' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5506b4e61a0af2_51952545')) {function content_5506b4e61a0af2_51952545($_smarty_tpl) {?><style>
    h1 { padding: .2em; margin: 0; }
    #products { float:right; width: 300px; margin-right: 2em }
    #cart { width: 200px; float: left; margin-top: 1em; }
    /* style the list to maximize the droppable hitarea */
    #cart ol { margin: 0; padding: 1em 0 1em 3em; }
</style>
<?php echo '<script'; ?>
>
    $(function() {
        $( "#catalog" ).accordion();
        $( "#catalog li" ).draggable({
            appendTo: "body",
            helper: "clone"
        });
        $( "#cart ol" ).droppable({
            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover",
            accept: ":not(.ui-sortable-helper)",
            drop: function( event, ui ) {
                $( this ).find( ".placeholder" ).remove();
                $( "<li></li>" ).text( ui.draggable.text() ).appendTo( this );
            }
        }).sortable({
            items: "li:not(.placeholder)",
            sort: function() {
                // gets added unintentionally by droppable interacting with sortable
                // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
                $( this ).removeClass( "ui-state-default" );
            }
        });
    });
<?php echo '</script'; ?>
>

<div id="products">
    <h1 class="ui-widget-header">מוזמנים</h1>
    <div id="catalog" >

        <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guestGroupedByGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
            <h2 ><a href="#" id="group_<?php echo $_smarty_tpl->tpl_vars['group']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->tpl_vars['group']->key];?>
</a></h2>
            <div style="max-height: 100px">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['guest'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['guest']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['guest']->key => $_smarty_tpl->tpl_vars['guest']->value) {
$_smarty_tpl->tpl_vars['guest']->_loop = true;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['guest']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['guest']->value->last_name;?>
 <b>(<?php echo $_smarty_tpl->tpl_vars['guest']->value->amount;?>
)</b></li>
                    <?php } ?>
                </ul>
            </div>

        <?php } ?>

    </div>
</div>

<div id="cart">
    <h1 class="ui-widget-header">Shopping Cart</h1>
    <div class="ui-widget-content">
        <ol>
            <li class="placeholder">Add your items here</li>
        </ol>
    </div>
</div><?php }} ?>
