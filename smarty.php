<?php
require_once('Smarty-3.1.21/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir='templates';
$smarty->compile_dir= 'templates_c';
$smarty->loadFilter("output","trimwhitespace");
$smarty->autoload_filters = array('pre' => array('angularjsescape'),'post' => array('angularjsescape'));
