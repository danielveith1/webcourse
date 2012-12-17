<?php
require_once ('/home/veithd1/WWW/2012webcourse/Final/inc/functions.php');

class UserTypes
{
        static function GetAll()
        {
                $conn = GetConnection();
                return $conn->query('SELECT * FROM UserTypes WHERE userTypeNumber=2');
        }
}
