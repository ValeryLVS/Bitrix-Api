<?php

namespace Api\Controllers;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Request;

class MainController
{
    public function getMain(Request $request)
    {
        $main = [
            'name' => 'value'
        ];

        header('Content-type: application/json; charset=utf-8"');
        echo Json::encode($main);
        exit();
    }
}