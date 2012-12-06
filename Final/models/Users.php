<?php
require_once ('/home/veithd1/WWW/2012webcourse/Final/inc/functions.php');

class Users
{
        static function GetAll()
        {
                $conn = GetConnection();
                return $conn->query('SELECT * FROM Users');
        }
        
        static function Get()
        {
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