<?php
// Report all PHP errors
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require_once 'dbconnect.php'; //Connecting to Mysql DB
require_once 'quarry.php'; //Getting the querry to execute

$query = get_quarry();
//print_r ($query);
$database = new db();

$res = $database->query($query);

$output = $database->result($res);
$out['rows'] = $output[0]; 
//print_r(json_encode($out));

header('Content-Type: application/json');
print (json_encode($out));
