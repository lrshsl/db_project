<?php

include $_SERVER['DOCUMENT_ROOT']."/scripts/generic_db_functions.php";

$main_table_create_cmd = '
  CREATE TABLE if not exists what_i_drank(
    entry_id        INT NOT NULL AUTO_INCREMENT,
    time            TIMESTAMP,
    what            INT NOT NULL,
    PRIMARY KEY (entry_id),
    FOREIGN KEY (what) REFERENCES beverage (beverage_id)
  );';

$beverage_table_create_cmd = '
  CREATE TABLE IF NOT EXISTS beverage(
    beverage_id     INT NOT NULL AUTO_INCREMENT,
    name            VARCHAR(20),
    amount          INT NOT NULL,
    PRIMARY KEY (beverage_id)
  );';

// Why I chose BINARY(20) as a type for id:

// It will always be a automaticly generated combination
// of numbers and characters, so it..
//   - doesn't have to support unicode symbols
//   - doesn't have to be variable in size
//   - will never reach the limit of 265 ^ 20 different symbols

// $create_participant_table_cmd = "
//   CREATE TABLE IF NOT EXISTS participants(
//     id                BINARY(10) NOT NULL UNIQUE,
//     user_name         VARCHAR(20),
//     score             INT
//   );
// ";

function add_participant($conn, $username, $age) {
  if (is_in_database($conn, "participants", "username", $username)) {
    echo "already inserted<br>";
  }
  db_insert($conn, "participants", "username, age", $username.", ".$age);
  echo "new participant added<br>" . $username;
}

$create_participant_table_cmd = '
  CREATE TABLE IF NOT EXISTS participants(
    username          VARCHAR(20) NOT NULL,
    age               INT
  );
';

function db_create_table($conn, $table_name) {
  echo "called<br>";
  global $create_participant_table_cmd;
  switch ($table_name) {
    case "participants":
      db_execute($conn, $create_participant_table_cmd);
      echo "table created: ".$table_name."<br>";
      break;
    case "answer":
      db_execute($conn, $create_participant_table_cmd);
      echo "table created: ".$table_name."<br>";
      break;
    case "question":
      db_execute($conn, $create_participant_table_cmd);
      echo "table created: ".$table_name."<br>";
      break;
    default:
      echo "Table not created: no create cmd found for ".$table_name."<br>";
  }
}

?>