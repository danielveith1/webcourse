<?php

require_once (__DIR__ . '/password.php');
function GetConnection()
{
        global $password;
        $conn = new mysqli('localhost','plotkinm', $password, 'plotkinm_db');
        return $conn;
}
function AutoSearch($id)
{
	$conn = GetConnection();
	$results = $conn->query("SELECT city, state, zip FROM US_Zip_Codes WHERE city LIKE '$id%' OR state LIKE '$id%' LIMIT 10");
	
	$row = $results->fetch_assoc();
                $conn->close();
                return $row;
	//SELECT city, state, zip FROM US_Zip_Codes WHERE city LIKE 'ba%' OR state LIKE 'ba%' LIMIT 10
}
