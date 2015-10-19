<?php
// Include the TextMagic PHP lib
require('utils/textmagic-sms-api-php/TextMagicAPI.php');

// Set the username and password information
$username = 'leonm';
$password = 'AtVa7f5zU1';

// Create a new instance of TM
$api = new TextMagicAPI(array(
    'username' => $username,
    'password' => $password
));

$text = "שלום בדיקה";

// Use this number for testing purposes. This is absolutely free.
$phones = array(9991234567);

$results = $api->send($text, $phones, true);

var_dump($results);

// result:  Result is: Array ( [messages] => Array ( [19896128] => 9991234567 ) [sent_text] => Wake up! [parts_count] => 1 )