<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

require_once('smarty.php');

$smarty->assign("title", 'יצירת ארוע חדש');
$smarty->display('create_project.tpl');