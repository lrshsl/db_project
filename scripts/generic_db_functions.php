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

function db_execute($db_connection, $cmd) {
    try {
        $db_connection->exec($cmd);
    } catch (PDOException $e) {
        echo "DBError: Could not execute query: ".$e->getMessage()."<br>";
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

function is_in_database($db_connection, $table_name, $attr_name, $value) {
    // $query = "SELECT * FROM ".$table_name;
    $query = "SELECT COUNT(1) FROM ".$table_name." WHERE ".$attr_name." = '".$value."';";
    $stmt = $db_connection->prepare($query);
    $stmt->execute();
    $found = $stmt->rowCount() == 1;
    return $found;
}

?>