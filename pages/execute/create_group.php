<?php
require_once '../../utils/HttpUtils.php';

require_once('../../classes/Persist.php');
$name = $requestParams['groupName'];
$persist = Persist::getInstance();

echo $persist->createGroup($name);
