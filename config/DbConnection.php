<?php

class DbConnection
{
    protected static $dbConnection;

    public static function getInstance()
    {
        if (!self::$dbConnection) {
            $username = 'root';
            $password = 'root';
            $host = 'localhost';
            $databaseName = 'comment_system';
            $port = 8889;
            self::$dbConnection = new PDO('mysql:host=' . $host . ';port:' . $port . ';dbname=' . $databaseName, $username, $password);
        }
        return self::$dbConnection;
    }
}

?>