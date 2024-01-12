<?php

namespace Api\Controllers;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Request;

class FooterController
{
    public function getFooter(Request $request)
    {
        $footer = [
            'name' => 'value'
        ];

        header('Content-type: application/json; charset=utf-8"');
        echo Json::encode($footer);
        exit();
    }
}