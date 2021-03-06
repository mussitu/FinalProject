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
    
    $record = todos::findOne($_GET['id']);
    $_SESSION['todoid'] = $_GET['id'];
}

?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Edit Todo Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id='edittodo' action="edit_todo_item.php" method="post">
            <?php
                echo "<h3>Edit To Do Item for {$_SESSION['userfname']}:</h3>";
                echo "<p>Email <input type='text' name='owneremail' value='{$record->owneremail}' /></p>";
                echo "<p>Create date <input type='text' name='createddate' value='{$record->createddate}' /></p>";
                echo "<p>Due date <input type='text' name='duedate' value='{$record->duedate}' /></p>";
                echo "<p>Message <input type='text' name='message' value='{$record->message}' /></p>";
            ?>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
