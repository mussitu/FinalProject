<?php

require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";

function loginUser()
{
    
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    define('USELOCALSERVER', TRUE);

    define('DATABASE', 'mt444');
    define('USERNAME', 'mt444');
    define('PASSWORD', 'ug1Ts82iV');

    if (USELOCALSERVER) {
        define('CONNECTION', 'localhost');
    } else {
        define('CONNECTION', 'sql2.njit.edu');
    }
    
    $formvars = array();
    
    $formvars["email"] = $_POST["email"];
    $formvars["password"] = $_POST["password"];
    
    $records = accounts::findAll();
    
    // Find this user...
    
    $userFound = FALSE;
    
    foreach ($records as $record) {
        if ($record->email == $formvars["email"]) {
            if ($record->password == $formvars["password"]) {
                $userFound = TRUE;
                // Create a session...
                session_start();
                $_SESSION["useremail"] = $formvars["email"];
                $_SESSION["userfname"] = $record->fname;
                $_SESSION["userlname"] = $record->lname;
                $_SESSION["userphone"] = $record->phone;
                $_SESSION["usergender"] = $record->gender;
                $_SESSION["userpassword"] = $record->password;
                $_SESSION["userid"] = $record->id;
                
                if (session_status() === PHP_SESSION_NONE) {
                    echo "<p>There is no session.</p>";
                }
                       
                echo "<p>Hello $record->fname, you are now logged in!</p>";
                echo "<p><a href='index.php'>Home</a></p>";
                break;
            }
        }
    }
        
    if (! $userFound) {
       echo "<p>No such user exists.</p>";
       echo "<ul>";
       echo "<li><a href='login.php'>Login in again</a></li>";
       echo "<li><a href='index.php'>Home</a></li>";
       echo "</ul>";
   }
    
    return true;
}

loginUser();
?>
