<?php
/*
//Format:dd-mm-yyyy
$string = '21-11-2018';
//21november 2018 year
$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
$replacement = 'Year $3, month $2, day$1'; //Year 2018, month 11, day21
echo preg_replace($pattern,$replacement, $string);
die();*/

// FRONT CONTROLLER

// 1. ЗАГАЛЬНІ НАЛАШТВАННЯ/ наприклад відображення помилок-тільки на час розробки
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

// 2.ПІДКЛЮЧЕННЯ ФАЙЛІВ СИСТЕМИ
    define('ROOT', dirname(__FILE__));
//    var_dump(ROOT);
    require_once 'components/Router.php';
    require_once 'components/Db.php';
// 3.ВСТАНОВЛЕННЯ ЗЄДНАННЯ З бд

// 4.ВИЗОВ Router
$router = new Router();
$router->run();

/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 28.01.2018
 * Time: 18:11
 */