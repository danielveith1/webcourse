<?php
require_once ('/home/veithd1/WWW/2012webcourse/Final/inc/functions.php');

class Logins{
	
	static function CheckPassword($input){
		//SELECT userNumber_FK FROM ContactMEthods WHERE contactValue = $row[contactValue]
	        	$conn = GetConnection();
                $result1 = $conn->query("SELECT userNumber_FK FROM ContactMethods WHERE contactValue='$input[email]'");
                $row1 = $result1->fetch_assoc();
                $result2 = $conn->query("SELECT password FROM Users WHERE userNumber=$row1[userNumber_FK]");
				$row2 = $result2->fetch_assoc();
				$conn->close();
				if($input['password'] == $row2['password'])
				return TRUE;
				else {
					return FALSE;
				}
                
	}

	static function Validate($row)
        {
        	echo "validate called";
                $results = array();
                if(empty($row['email'])) $results['email'] = 'email is required';
                if(empty($row['password'])) $results['password'] = 'password is required';
               
                return count($results) > 0 ? $results : true;
        }		
	}
