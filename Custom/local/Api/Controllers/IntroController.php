<?php

namespace Api\Controllers;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Request;

class IntroController
{
    public function getIntro(Request $request)
    {
        $intro = [
            'name' => 'value'
        ];

        header('Content-type: application/json; charset=utf-8"');
        echo Json::encode($intro);
        exit();
    }
}