<?php

require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";

function registerUser()
{
    echo "<p>Registering user...</p>";
    
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
    
    $formvars["firstname"] = $_POST["firstname"];
    $formvars["lastname"] = $_POST["lastname"];
    $formvars["email"] = $_POST["email"];
    $formvars["password"] = $_POST["password"];
    
    try {
    accounts::insertOne(array('fname' => $formvars['firstname'],
                              'lname' => $formvars['lastname'],
                              'email' => $formvars['email'],
                              'password' => $formvars['password']));
    echo "<p>Successfull registered user " . $formvars["email"] . "!</p>";
    } catch (Exception $e) {
        echo "<p>Failed to register: " . $e->getMessage() . "</p>";
    }
    
    return true;
}

registerUser();

echo "<p><a href='index.php'>Home</a></p>";
?>
