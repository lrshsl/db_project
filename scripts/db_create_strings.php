<?php

$create_table_commands = [
    "users" => "CREATE TABLE IF NOT EXISTS users(
        user_id             INT NOT NULL AUTO_INCREMENT,
        username            VARCHAR(20) NOT NULL,
        age                 INT,

        PRIMARY KEY         (user_id),
    );",

    "questions" => "CREATE TABLE IF NOT EXISTS questions(
        question_id         INT NOT NULL AUTO_INCREMENT,
        text                VARCHAR(128) NOT NULL UNIQUE,
        correct_answer_id   INT,
        author_id           INT,

        PRIMARY KEY         (question_id),
        FOREIGN KEY         (correct_answer_id),
        REFERENCES          correct_answers(answer_id),
        FOREIGN KEY         (author_id)
        REFERENCES          users(user_id),
    );",

    "correct_answers" => "CREATE TABLE IF NOT EXISTS correct_answers(
        answer_id           INT NOT NULL AUTO_INCREMENT,
        text                VARCHAR(128) NOT NULL,
        points              INT NOT NULL,

        PRIMARY KEY         (answer_id),
    );",

    "user_answers" => "CREATE TABLE IF NOT EXISTS user_answers(
        answer_id           INT NOT NULL AUTO_INCREMENT,
        text                VARCHAR(128) NOT NULL,
        user_id             INT,
        question_id         INT,

        PRIMARY KEY         (answer_id),
        FOREIGN KEY         (user_id)
        REFERENCES          users(user_id),
        FOREIGN KEY         (question_id)
        REFERENCES          questions(question_id),
    );",
]

?>