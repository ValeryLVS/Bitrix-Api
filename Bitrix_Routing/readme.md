# Инструкция по настройке роутера Bitrix

1. Для запуска новой системы Routing нужно перенаправить обработку 404 ошибок в зависимости от веб-сервера

```
Пример в nginx:
location / {
    try_files $uri $uri/ /bitrix/routing_index.php$is_args$args;
}

Прмиер если используется .htaccess:

#RewriteCond %{REQUEST_FILENAME} !/bitrix/urlrewrite.php$
#RewriteRule ^(.*)$ /bitrix/urlrewrite.php [L]
RewriteCond %{REQUEST_FILENAME} !/bitrix/routing_index.php$
RewriteRule ^(.*)$ /bitrix/routing_index.php [L]
```

2. Файлы с конфигурацией маршрутов располагаются в папках /bitrix/routes/ и /local/routes/. Для подключения файла
   следует описать его в файле .settings.php в секции routing:

```php
'routing' => [
        'value' => [
            'config' => [
                'api.php'
            ],
        ],
        'readonly' => true,
    ]   
```

3. Внутри папки bitrix/routes добавьте файл api.php с содержимым:

- (Формат файла предполагает возврат замыкания, в которое передается объект конфигурации маршрутов):

```php
<?php

use Bitrix\Main\Routing\RoutingConfigurator;

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/routes/api.php')) {
    $customRoutesClosure = include $_SERVER['DOCUMENT_ROOT'] . '/local/routes/api.php';
    
    if ($customRoutesClosure instanceof Closure) {
        return $customRoutesClosure;
    }
}

return function (RoutingConfigurator $routingConfigurator) {
    //
};
```

4. Внутри папки local/routes добавьте файл api.php с содержимым

- (Формат файла предполагает возврат замыкания, в которое передается объект конфигурации маршрутов):

```php
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
```

5. Теперь в каждом модуле вы можете создавать файл routes.php, где регистрировать свои маршруты пример в репозитории.