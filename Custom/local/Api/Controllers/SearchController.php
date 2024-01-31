<?php

namespace Api\Controllers;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Request;

class SearchController
{
    public function search(Request $request)
    {
        $result = [
            'name' => 'value'
        ];

        header('Content-type: application/json; charset=utf-8"');
        echo Json::encode($result);
        exit();
    }
}