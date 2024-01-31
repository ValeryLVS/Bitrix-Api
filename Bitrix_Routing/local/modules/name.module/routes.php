<?php

use Bitrix\Main\Routing\RoutingConfigurator;
use Shop\Api\DeviceController;
use Shop\Api\MessageController;


return function (RoutingConfigurator $routes) {
    $routes->prefix('api')->group(function (RoutingConfigurator $routes) {
        $routes->prefix('product')->group(function (NameController $routes) {
            $routes->get('device/{id}/', [DeviceController::class, 'deviceByIds']);
            $routes->get('devices/', [DeviceController::class, 'devices']);
        });
        $routes->prefix('message')->group(function (RoutingConfigurator $routes) {
            $routes->post('add/', [MessageController::class, 'add']);
        });
    });
};
