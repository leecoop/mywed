<?php
define('INDEXLOAD', true);
include_once ('../subaban/site/conn.php');
require_once 'toXsl.php';

$rs = $db->query("Select * From pmsg limit 2");

$translates = array(
    'subject' => 'נושא ההודעה'
);

toXsl($rs,$translates,'pmsg', 'pmsg');

?>