<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
      
require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";

/*
define(WEBROOT, dirname(__FILE__) . '/');

spl_autoload_register(function ($class_name) {
    $className=str_replace("\\","/",$class_name);
    $class= WEBROOT . '' ."{$className}.php";
    include $class;
});
 * 
 */

//turn on debugging messages
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


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, th, td {
            border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <ul>
            <li><a href="create_account.php">Create an Account</a></li>
            <li><a href="login.php">Login to Existing Account</a></li>
            <li><a href="updateinfo.php">Update Account Information</a></li>
            <li><a href="createtodo.php">Add ToDo</a></li>
            <li><a href="listtodos.php">List ToDos</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </body>
</html>
