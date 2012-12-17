<?php
$rootUrl = '/~veithd1/2012webcourse/Final';
require_once (__DIR__ . '/password.php');
function GetConnection()
{
	global $password;
	$conn = new mysqli('localhost','veithd1', $password, 'veithd1_db');
	return $conn;
}


function EscapeRow($row, $conn)
{
        $row2 = array();
        foreach ($row as $key => $value) {
                $row2[$key] = $conn->real_escape_string($value);
				echo "loop";
        }
        return $row2;
}

