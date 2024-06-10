<?php
$servername = "localhost";
$username = "root";
$password =
$dbname = "scoutsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$_GLOBALS['conn'] = $conn;

// Check connection
function checkConnection() {
    if ($_GLOBALS['conn'] == null) {
        $_GLOBALS['connstatus'] = false;
    } else {
        $_GLOBALS['connstatus'] = true;
    }
}
?>