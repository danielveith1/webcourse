<?php
$rootUrl = '/~veithd1/2012webcourse/Final';
require_once (__DIR__ . '/password.php');
function GetConnection()
{
	global $password;
	$conn = new mysqli('localhost','veithd1', $password, 'veith1_db');
	return $conn;
}

