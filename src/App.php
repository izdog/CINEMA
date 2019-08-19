<?php
namespace App;
use PDO;

class App {
    private static $pdo;

    public static function getPDO(){
        if(!self::$pdo){
            self::$pdo = new \PDO('mysql:host=localhost; dbname=cinema; charset=utf8', 'root', 'root',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }

        return self::$pdo;
    }
}