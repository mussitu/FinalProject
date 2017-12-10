<?php
require_once "dbConn.php";
require_once "collection.php";
require_once "accounts.php";
require_once "todos.php";
require_once "model.php";
require_once "account.php";
require_once "todo.php";
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Register New User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id='register' action="register_new_user.php" method="post">
            <h3>Create an Account:</h3>
            <p>Your first name <input type="text" name="firstname" /></p>
            <p>Your last name <input type="text" name="lastname" /></p>
            <p>Your email address <input type="text" name="email" /></p>
            <p>Desired password <input type="password" name="password" /></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
