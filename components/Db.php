<?php

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT. '/config/db_params.php';
        $params = include ($paramsPath);

        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 29.01.2018
 * Time: 18:00
 */