<?php

class Router {

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);
    }

    // return request string
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        /*print_r($this->routes);    //тестування
        echo 'Class Router, method run';*/

        //отримати строку запроса
        $uri = $this->getURI();

        //перевірити наявність такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
//            echo "<br>$uriPattern -> $path";

            //Зрівнюємо $uriPattern з $path
            if (preg_match("~$uriPattern~", $uri)) {

                /*echo "<br>Де шукаємо (запрос, який набрав користувч): ". $uri;
                echo "<br>Що шукаємо (співпадіння з правила) ".$uriPattern;
                echo "<br>Хто опрацьовує: ".$path;*/
                //отримуємо внутріш шлях з зовнішнього згідо правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
//                echo "<br><br>Потрібно сформувати: ". $internalRoute;

                //оприділити який контролер і акшин обробляють запрос

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                /*echo "<br>Controller Name: ".$controllerName;
                echo "<br>action Name: ".$actionName;*/
                $parameters = $segments;
                /*echo '<pre>';
                    var_dump($parameters);
                echo '</pre>';
                die();*/
                //підключит файл класа-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                //перевіряємо чи існує такий файл
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //создати обєкт, визвати метод тобто акшин
                $controllerObject = new $controllerName;
//                $result = $controllerObject->$actionName($parameters);
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 29.01.2018
 * Time: 0:15
 */