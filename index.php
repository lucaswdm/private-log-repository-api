<?php

#error_reporting(E_ALL); ini_set('display_errors', true);

$IP = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'];

#print_r($_REQUEST);

$DATE = date('Y-m-d');
$HORA = date('H:i:s');

if(filter_var($IP, FILTER_VALIDATE_IP) && isset($_REQUEST['from']) && $_REQUEST['from'] == 'data2')
{
    $DIR = __DIR__ . '/storage/servers/' . $DATE . '/';
    $FILE = $DIR . $IP;
    if(!is_dir($DIR)) mkdir($DIR, 0755, true);
    $_REQUEST['_date'] = $DATE . ' ' . $HORA;
    $ok = file_put_contents($FILE, json_encode($_REQUEST) . PHP_EOL, FILE_APPEND);
    print_r($ok);
}
