<?php
require_once('../classes/Persist.php');

session_start();
$_SESSION['name'] = 'Leon';
header("Location: index.php");




