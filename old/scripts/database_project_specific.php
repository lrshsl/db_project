<?php

include 'generic_db_functions'

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
// It will always be a combination
//   - is not UTF-encoded
//   - has the right rumber
$create_participant_table_cmd = '
  CREATE TABLE IF NOT EXISTS participant(
    id                BINARY(10) NOT NULL UNIQUE,
    user_name         VARCHAR(20),
    score             INT
  );
';

function create_table($conn, $table_name) {
  switch $table_name) {
    case 'participant':
      db_execute($create_participant_table_cmd);
      break;
    case 'answer':
      db_execute($create_participant_table_cmd);
      break;
  }
    case 'question':
      db_execute($create_participant_table_cmd);
  }
}

?>