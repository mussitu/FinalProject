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
    
    $records = todos::findAll();
    
    $recordsForUser = array();
    
    foreach ($records as $record) {
        if ($record->ownerid == $_SESSION['userid']) {
            array_push($recordsForUser, $record);
        }
    }
    
    if (count($recordsForUser) == 0) {
        echo <<<EOD
        <html>
            <head>
                <title>List ToDos</title>
            </head>
            <body>
                <p>No ToDos for the current user!</p>
                <p><a href='index.php'>Home</a></p>
            </body>
        </html>
EOD;
    } else {
        echo <<<EOD
        <html>
            <head>
                <style>
                    table, th, td {
                    border: 1px solid black;
                    }
                </style>
                <title>List ToDos</title>
            </head>
            <body>
EOD;
        echo todo::format_to_html($recordsForUser);
        echo "</body></html>";
    }
}