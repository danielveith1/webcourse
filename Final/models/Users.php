<?php
require_once ('/home/veithd1/WWW/2012webcourse/Final/inc/functions.php');

class Users
{
        static function GetAll()
        {
                $conn = GetConnection();
                return $conn->query('SELECT * FROM Users');
        }
        
        static function Get($id)
        {
        	$conn = GetConnection();
                $results = $conn->query("SELECT * FROM Users WHERE userNumber=$id");
                $row = $results->fetch_assoc();
                $conn->close();
                return $row;
			
        }

        static function Insert()
        {
        }
        
        static function Update()
        {
        }
        
        static function Delete()
        {
        }
}