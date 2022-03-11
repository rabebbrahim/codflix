<?php

/*************************************
* ----- INIT DATABASE CONNECTION -----
*************************************/

function init_db()
{
    try {

        $host = $_ENV['CODFLIX_DB_HOST'] ?? 'localhost';
        $dbname = $_ENV['CODFLIX_DB_NAME'] ?? 'codflix';
        $charset = $_ENV['CODFLIX_DB_CHARSET'] ?? 'utf8';
        $user = $_ENV['CODFLIX_DB_USER'] ?? 'root';
        $password = $_ENV['CODFLIX_DB_PASSWORD'] ?? 'root';
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",
            $user,
            $password);

        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",
            $user,
            $password);

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $db;
}
