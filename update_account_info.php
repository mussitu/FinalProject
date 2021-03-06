<?php

require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";

function updateAccountInfo()
{
    session_start();
                
    if(session_id() == '' || ! isset($_SESSION)) {
        echo "<h1>Not logged in!</h1>";
        return;
    }
    
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    define('USELOCALSERVER', FALSE);

    define('DATABASE', 'mt444');
    define('USERNAME', 'mt444');
    define('PASSWORD', 'ug1Ts82iV');

    if (USELOCALSERVER) {
        define('CONNECTION', 'localhost');
    } else {
        define('CONNECTION', 'sql2.njit.edu');
    }
    
    $formvars = array();
    
    $formvars["fname"] = $_POST["fname"];
    $formvars["lname"] = $_POST["lname"];
    $formvars["email"] = $_POST["email"];
    $formvars["phone"] = $_POST["phone"];
    $formvars["password"] = $_POST["password"];
    $formvars["gender"] = $_POST["gender"];
    
    $records = accounts::findAll();
    
    // Find this user...
    
    foreach ($records as $record) {
        if ($record->email == $formvars["email"]) {
            if ($record->password == $_SESSION["userpassword"]) {
                
                accounts::updateOne($record->id,
                        array('fname' => $formvars['fname'],
                              'lname' => $formvars['lname'],
                              'email' => $formvars['email'],
                              'gender' => $formvars['gender'],
                              'phone' => $formvars['phone'],
                              'password' => $formvars['password']));
                
                $_SESSION["useremail"] = $formvars["email"];
                $_SESSION["userfname"] = $formvars['fname'];
                $_SESSION["userlname"] = $formvars['lname'];
                $_SESSION["userphone"] = $formvars['phone'];
                $_SESSION["usergender"] = $formvars['gender'];
                $_SESSION["userpassword"] = $formvars['password'];
            }
            break;
        }
    }
        
    echo "<p>Account Updated</p>";
    echo "<p><a href='index.php'>Home</a></p>";
    
    return true;
}

updateAccountInfo();
?>
