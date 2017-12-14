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
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id='login' action="login_user.php" method="post">
            <h3>Login to an Existing Account:</h3>
            <p>Email address <input type="text" name="email" /></p>
            <p>Password <input type="password" name="password" /></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
