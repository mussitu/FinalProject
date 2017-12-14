<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
                
if((session_status() === PHP_SESSION_NONE)  || (session_id() == '') || (! isset($_SESSION))) {
    echo "<h1>Not logged in!</h1>";
    echo "<p><a href='index.php'>Home</a></p>";
} else {
    session_unset();
    session_destroy();
    echo "<p>You are now logged out!</p>";
    echo "<p><a href='index.php'>Home</a></p>";
    
}