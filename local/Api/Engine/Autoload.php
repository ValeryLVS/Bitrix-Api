<?php

namespace Api\Engine;


class Autoload
{
    /**
     * Метод подключает все созданные классы в API
     * @param $className
     * @return void
     */
    public function loadClass($className): void
    {
        $fileName = str_replace(['Api', '\\'], [dirname(__DIR__), DIRECTORY_SEPARATOR], $className). '.php';;

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}