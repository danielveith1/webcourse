<?php
require_once ('/home/veithd1/WWW/2012webcourse/Final/inc/functions.php');

class Users
{
        static function GetAll()
        {
                $conn = GetConnection();
                return $conn->query('SELECT * FROM Users U Join UserTypes K ON U.userTypeNumber_FK=K.userTypeNumber');
        }
        
        static function Get($id)
        {
        	$conn = GetConnection();
                $results = $conn->query("SELECT * FROM Users WHERE userNumber=$id");
                $row = $results->fetch_assoc();
                $conn->close();
                return $row;
			
        }
		 
		 static function MaxUserNumber()
		 {
		 	$conn = GetConnection();
		 	$SQL = "SELECT MAX(userNumber) from Users";
			$result = mysqli_query($conn, $SQL);
			if (!$result)
    			die("<p>Unable to execute the query.</p>");
			$row = mysqli_fetch_row($result);
			return $row[0]+1;
		 }
		 static function Blank()
        {
        	
				echo "blank called";
        		return array('userNumber'=>null,'firstName'=>null,'lastName'=>null,'addressLine1'=>null,'addressLine2'=>null,'city'=>null,'state'=>null,'zipcode'=>null,'country'=>null,'createdAt'=>null,
                'updatedAt'=>null,'userTypeNumber_FK'=>2,);
        }
		
        static function Insert($row)
        {
        	
			/*
			 * INSERT INTO `veithd1_db`.`Users` (`userNumber`, `firstName`, `lastName`, `addressLine1`, `addressLine2`, `city`, `state`, `zipcode`, `country`, `createdAt`, `updatedAt`, `userTypeNumber_FK`) 
			 * VALUES (NULL, 'd', 'one', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2');
			 * 
			 *INSERT INTO 'veithd1_db'.'Users' (`userNumber`, `firstName`, `lastName`, `addressLine1`, `addressLine2`, `city`, `state`, `zipcode`, `country`, `createdAt`, `updatedAt`, `userTypeNumber_FK`)
			 * VALUES (NULL, 'prolog', 'master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2'); 
			 * 
			 */
			 echo "insert called";
                $conn = GetConnection();
                $row2 = EscapeRow($row, $conn);
				echo "escapeRow called";
                $sql =  "Insert INTO veithd1_db.Users (`userNumber`, `firstName`, `lastName`, `addressLine1`, `addressLine2`, `city`, `state`, `zipcode`, `country`, `createdAt`, `updatedAt`, `userTypeNumber_FK`) "
                        .       "Values (NULL,'$row2[firstName]','$row2[lastName]', '$row2[addressLine1]', '$row2[addressLine2]', '$row2[city]', '$row2[state]', '$row2[zipcode]', 
                        '$row2[country]', Now(), NULL, '2') ";
               
               echo $sql;
                $conn->query($sql);
                $error = $conn->error;
                if(empty($error))
                        $row['userNumber'] = $conn->insert_id;
                $conn->close();
               
                return $error != '' ? array('Server Error' => $error) : true;          
        }
        
        
        static function Update($row)
        {
        	echo "update called";
        	$conn = GetConnection();
			$row2 = EscapeRow($row, $conn);
			$sql = "UPDATE Users "
				.	"Set firstName='$row2[firstName]',lastName='$row2[lastName]',userTypeNumber_FK=$row2[userTypeNumber_FK] "
                .	"WHERE userNumber=$row[userNumber] ";
                echo $sql;
                $conn->query($sql);
                $error = $conn->error;
                $conn->close();
                
                return $error != '' ? array('Server Error' => $error) : true;
        }
        
        static function Delete($id)
        {
                $conn = GetConnection();
                $sql =  "DELETE FROM Users WHERE userNumber=$id ";
                echo $sql;
                $conn->query($sql);
                $error = $conn->error;
                $conn->close();
               
                return $error != '' ? array('Server Error' => $error) : true;          
        }

		
		static function Validate($row)
        {
        	echo "validate called";
                $results = array();
               // if(!is_numeric($row['userTypeNumber_FK'])) $results['userTypeNumber_FK'] = 'userTypeNumber_FK needs to be a number';
                //if(empty($row['userTypeNumber_FK'])) $results['userTypeNumber_FK'] = 'userTypeNumber_FK is required';
                if(empty($row['firstName'])) $results['firstName'] = 'FirstName is required';
                if(empty($row['lastName'])) $results['lastName'] = 'LastName is required';
               
                return count($results) > 0 ? $results : true;
        }
		
}