<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "form_system";

// create connection
$conn = new MySqli($server, $user, $pass, $database);

// check connection 
if (!$conn) {
    die ("<script>alert('Connection Failed.')</script>");
}

?>