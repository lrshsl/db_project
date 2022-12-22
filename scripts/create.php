<?php

// include $_SERVER['DOCUMENT_ROOT']."/scripts/generic_db_functions.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/db_project_specific.php";

$servername = "localhost";
$database = "test_ef5_lrs";

$username = "root";
$password = "groot";

if (!$conn = db_connect($servername, $database, $username, $password)) {
    echo "Could not connect to db<br>";
}

// Drop tables so that they can get renewed:
// db_delete_table($conn, 'what_i_drank');
// db_delete_table($conn, 'beverage');

// db_create_table($conn, $main_table_create_cmd);
// db_create_table($conn, $beverage_table_create_cmd);
db_delete_table($conn, "");
db_create_table($conn, "");


db_delete_table($conn, "users");
db_create_table($conn, "users");
add_participant($conn, "lrs", 4);

// db_insert($conn, 'beverage', 'name, amount', "'coca', 4");

$conn = null

?>