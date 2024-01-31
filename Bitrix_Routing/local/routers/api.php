<?php

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Routing\RoutingConfigurator;

/*
 * Получение маршрутов установленных в local модулей
 *
 * Данный файл отвечает за Routing API методов проекта.
 * При изменении в файлах routes.php требуется сброс кеша.
 * @return array
 */
$getRoutePaths = static function (): array {
    foreach (ModuleManager::getInstalledModules() as $module) {
        $route = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $module['ID'] . '/routes.php';
        if (file_exists($route)) {
            $routes[] = $route;
        }
    }
    return $routes ?? [];
};

return function (RoutingConfigurator $routingConfigurator) use ($getRoutePaths) {
    foreach ($getRoutePaths() as $route) {
        $callback = include $route;
        if ($callback instanceof Closure) {
            $callback($routingConfigurator);
        }
    }
};