<?php

global $db;
$db = new SQLite3(DB_FILENAME);

function create_tables()
{
    global $db;

    $db->query("
        CREATE TABLE IF NOT EXISTS options
        (
            id INTEGER PRIMARY KEY NOT NULL,
            option_name TEXT NOT NULL,
            option_value TEXT NOT NULL
        );
    ");

    $db->query("
        CREATE TABLE IF NOT EXISTS users
        (
            id INTEGER PRIMARY KEY NOT NULL,
            username TEXT NOT NULL,
            password TEXT NOT NULL,
            first_name TEXT NOT NULL,
            last_name TEXT NOT NULL
        );
    ");
}

