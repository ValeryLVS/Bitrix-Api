<?php

namespace Api\Router;


use Bitrix\Main\Context;

class Router
{
    private string $controller;
    private string $action;
    private object $params;

    public function __construct()
    {
        $this->request = Context::getCurrent()->getRequest();
    }

    /**
     * Метод возвращает название Controller, который необходимо использовать.
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * Метод возвращает название метода который необхоимо вызвать в Controller.
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Метод возвращает класс Request Bitrix.
     * @return array
     */
    public function getParams(): object
    {
        return $this->params;
    }

    /**
     * Метод разбирает полученный запрос для подключения нужного Controller, Action и парамтеров.
     * @return array
     */
    private function getURI(): array
    {
        return explode('/', trim($this->request->getRequestedPageDirectory(), '/'));
    }

    /**
     * Метод парсит все необхимоые партаметры для работы API.
     * @return void
     */
    public function run(): void
    {
        $uri = $this->getURI();
        $this->controller = ucfirst($uri[1]) . "Controller";
        $this->action = $uri[2];
        $this->params = $this->request;
    }
}