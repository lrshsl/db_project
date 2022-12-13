<?php

function db_connect($servername, $db_name, $username, $password) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOExeption $e) {
      echo "DBError: ".$e->getMessage()."<br>";
    }
  return $conn;
}

function db_delete_table($db_connection, $table) {
    try {
        $db_connection->exec("DROP TABLE IF EXISTS ".$table);
    } catch (PDOException $e) {
        echo "DBError: Could not delete table: ".$e->getMessage()."<br>";
        return false;
    }
    return true;
}

function db_execute($db_connection, $table_create_command) {
    try {
        $db_connection->exec($table_create_command);
    } catch (PDOException $e) {
        echo "DBError: Could not create table: ".$e->getMessage()."<br>";
        return false;
    }
    return true;
}

function db_insert($db_connection, $table_name, $elements, $values) {
    try {
        $db_connection->exec(
          'INSERT INTO '.$table_name.'('.$elements.') VALUES('.$values.');'
        );
    } catch (PDOException $e) {
        echo "DBError: ".$e->getMessage()."<br>";
        return false;
    }
    return true;
}

?>