<?php
//https://www.w3schools.com/php/php_mysql_connect.asp
class Dbc
{
    protected function connect()
    {
        // try connecting
        try {

            $host = 'localhost';
            $db = 'ontime';
            $user = 'root';
            $password = '';

            $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

            $db = new PDO($dsn, $user, $password);

            return $db;

            // display any errors
        } catch (PDOException $e) {

            print "Error -> " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
