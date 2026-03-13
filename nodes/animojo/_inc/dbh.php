<?php
$servername = "db.fr-pari1.bengt.wasmernet.com";
$db_name = "animojo";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $db_name, 10272);
if ($conn->connect_error)
    die("db connection failed: " . $conn->connect_error);