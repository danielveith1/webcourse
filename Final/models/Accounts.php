<?php
session_start();
$rootUrl = '/~veithd1/2012webcourse/Final';
function IsLoggedIn()
{
        return UserId() != FALSE;
}

function UserId()
{
        return isset($_SESSION['UserId']) ? $_SESSION['UserId'] : FALSE;
}

function User()
{
       
}

function RequireLogin()
{
        global $rootUrl;
        if(!IsLoggedIn())
        {
                header("Location: $rootUrl/views/Accounts/login.php");
                die();
        }
}

function DoLogin($email, $password, $returnURL)
{
        global $rootUrl;
        if(!empty($returnURL))
        {
                $_SESSION['returnURL'] = $returnURL;
        }elseif(isset($_REQUEST['returnURL'])){
                $_SESSION['returnURL'] = $_REQUEST['returnURL'];                        
        }elseif(!isset($_SESSION['returnURL']) && isset($_SERVER['HTTP_REFERER'])){
                $_SESSION['returnURL'] = $_SERVER['HTTP_REFERER'];
        }
        if(isset($_SESSION['returnURL']))
                $returnURL = $_SESSION['returnURL'];
        else
                $returnURL = $rootUrl . '/views/Users/';
       
        $_SESSION['UserId'] = $email;
        header("Location: $returnURL");
        die();
}
