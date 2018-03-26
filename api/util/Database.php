<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 20.03.18
 * Time: 13:49
 */

class Database
{
    private static $serverName = "localhost";
    private static $dbName = "fruttiTutti";
    private static $username = "root";
    private static $password = "";

    private static $dbConn = null;

    public static function getDbConn() : PDO
    {
        if (Database::$dbConn === null) {
            try {
                Database::$dbConn = new PDO(
                    "mysql:host=" . Database::$serverName . ";dbname=" . Database::$dbName,
                    Database::$username,
                    Database::$password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );
                // set the PDO error mode to exception
                Database::$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("DatabaseConnection failed");
            }
        }
        return Database::$dbConn;
    }


}