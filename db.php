<?php

$servername = "87.250.63.45";
$username = "root";
$password = "gtrdsnetrt";
$dbname = "hurryupr_database1";
$charset = 'utf8mb4';
$port = 11883;
// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname, $port);
$conn->set_charset($charset);
$conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
// Check connection  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

unset($servername, $dbname, $username, $password, $charset, $port); // we don't need them anymore

/*$servername = "localhost";
$username   = "hurryupr_milos";
$password   = "miloskralj";
$dbname     = "hurryupr_database1";
// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/
