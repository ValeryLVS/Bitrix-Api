<?php

namespace Api\Engine;


use Api\Router\Router;

class App
{
    private  static $instance = null;

    public static function call()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Метод подключает необходимый Controller и Action с параметрами для работы API.
     * @return void
     */
    function runController(): void
    {
        $router = new Router();
        $router->run();

        $method = $router->getAction();
        $controllerClass = 'Api\Controllers\\' . $router->getController();

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            if (method_exists($controller, $method)) {
                $controller::$method($router->getParams());
            } else {
                echo 'Метод не найден';
            }
        } else {
            echo 'Контроллер не найден';
        }
    }

    public function run(): void
    {
        $this->runController();
    }
}