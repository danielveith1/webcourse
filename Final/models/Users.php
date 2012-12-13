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

        static function Insert($row)
        {
        }
        
        static function Update($row)
        {
        	$conn = GetConnection();
			$sql = "UPDATE Users "
				.	"Set firstName='$row[firstName]', lastName='$row[lastName]', createdAt='$row[createdAt]', updatedAt='$row[updatedAt]' "
                        .	"WHERE userNumber=$row[userNumber] ";
                //echo $sql;
                $conn->query($sql);
                $error = $conn->error;
                $conn->close();
                
                return $error != '' ? array('Server Error' => $error) : true;
        }
        
        static function Delete($id)
        {
        }
}