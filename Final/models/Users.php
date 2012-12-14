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
			$row2 = EscapeRow($row, $conn);
			$sql = "UPDATE Users "
				.	"Set firstName='$row2[firstName]', lastName='$row2[lastName]', createdAt='$row2[createdAt]', updatedAt='$row2[updatedAt]', userNumber='$row2[userNumber]' "
                        
                .	"WHERE userNumber=$row[userNumber] ";
                echo $sql;
                $conn->query($sql);
                $error = $conn->error;
                $conn->close();
                
                return $error != '' ? array('Server Error' => $error) : true;
        }
        
        static function Delete($id)
        {
        }
		
		static function Validate($row)
        {
                $results = array();
                if(!is_numeric($row['userNumber'])) $results['userNumber'] = 'userNumber needs to be a number';
                if(empty($row['userNumber'])) $results['userNumber'] = 'userNumber is required';
                if(empty($row['firstName'])) $results['firstName'] = 'FirstName is required';
                if(empty($row['lastName'])) $results['lastName'] = 'LastName is required';
               
                return count($results) > 0 ? $results : true;
        }
		
}