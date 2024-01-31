<?php

namespace Api\Controllers;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Request;

class HeaderController
{
    public function getHeader(Request $request)
    {
        $header = [
            'name' => 'value'
        ];

        header('Content-type: application/json; charset=utf-8"');
        echo Json::encode($header);
        exit();
    }
}