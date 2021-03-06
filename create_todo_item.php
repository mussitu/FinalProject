<?php
require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";

session_start();

if(session_id() == '' || ! isset($_SESSION)) {
    echo "<h1>Not logged in!</h1>";
    echo "<p><a href='index.php'>Home</a></p>";
} else {
    
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
    
    $formvars["email"] = $_POST["email"];
    $formvars["duedate"] = $_POST["duedate"];
    $formvars["message"] = $_POST["message"];
    
    $now = new DateTime();
    
    $record = todos::insertOne(array('owneremail' => $formvars["email"],
                       'ownerid' => $_SESSION["userid"],
                       'createddate' => $now->format('Ymd'),
                       'duedate' => $formvars["duedate"],
                       'message' => $formvars["message"],
                       'isdone' => 0));
        
    echo "<p>Todo Created</p>";
    echo "<p><a href='index.php'>Home</a></p>";
}
