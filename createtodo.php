<?php
require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";

session_start();
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Create Todo Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id='createtodo' action="create_todo_item.php" method="post">
            <?php
                echo "<h3>Create To Do Item for {$_SESSION['userfname']}:</h3>";
                echo "<p>Email <input type='text' name='email' value='{$_SESSION['useremail']}' /></p>";
            ?>
            <p>Due date <input type="text" name="duedate" /></p>
            <p>Message <input type="text" name="message" /></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
