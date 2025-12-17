<?php

class Database
{
    private static ?PDO $conn = null;

    public static function getConnection(): PDO
    {
        if (self::$conn === null) {
            $host = 'localhost';
            $db   = 'sms_db'; // Update database name before testing if necessary
            $user = 'root';
            $pass = '';

            $dsn = "mysql:host=$host;dbname=$db";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            self::$conn = new PDO($dsn, $user, $pass, $options);
        }

        return self::$conn;
    }
}
