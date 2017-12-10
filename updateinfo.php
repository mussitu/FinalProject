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
        <title>Update Account Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            session_start();
                
            if(session_id() == '' || ! isset($_SESSION)) {
                echo "<p>You are not logged in.</p>";
                echo " <ul>"
                        . " <li><a href=\create_account.php\>Create an Account</a></li>"
                        . " <li><a href='login.php'>Login to Existing Account</a></li>"
                        . " </ul>";
            } else {
                $email = $_SESSION["useremail"];
                $fname = $_SESSION["userfname"];
                $lname = $_SESSION["userlname"];
                $phone = $_SESSION["userphone"];
                $gender = $_SESSION["usergender"];
                
                $password = $_SESSION["userpassword"];
                echo "<form id='updateinfo' action='update_account_info.php' method='post'>"
                    . " <h3>Update Account Information:</h3>"
                    . " <p>First name <input type='text' name='fname' value='$fname' /></p>"
                    . " <p>Last name <input type='text' name='lname' value='$lname' /></p>"
                    . " <p>Gender <input type='text' name='gender' value='$gender' /></p>"
                    . " <p>Email address <input type='text' name='email' value='$email' /></p>"
                    . " <p>Telephone <input type='text' name='phone' value='$phone' /></p>"
                    . " <p>Password <input type='password' name='password' value='$phone' /></p>"
                    . " <p><input type='submit' /></p>"
                    . " </form>";
            }
        ?>
    </body>
</html>
