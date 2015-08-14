<?php
$requestParams = array();
foreach ($_REQUEST as $key => $value) {
    $requestParams[$key] = strip_tags($value);
}

?>
