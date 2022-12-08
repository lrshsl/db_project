<?php
include 'database.php';

$servername = "localhost";
$database = "test_ef5_lrs";

$username = "root";
$password = "groot";

if ($conn = db_connect($servername, $database, $username, $password)) {
    echo "Connected to db<br>";
}

// Drop tables so that they can get renewed:
// db_delete_table($conn, 'what_i_drank');
// db_delete_table($conn, 'beverage');

db_create_table($conn, $main_table_create_cmd);
db_create_table($conn, $beverage_table_create_cmd);

db_insert($conn, 'beverage', 'name, amount', "'coca', 4");

$conn = null

?>