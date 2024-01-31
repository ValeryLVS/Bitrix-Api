<?php

namespace Api\Controllers;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Request;

class NewsController
{
    public function getNews(Request $request)
    {
        dump($request->getPostList()->getValues());
        dump($request->getQueryList()->getValues());
        die('getNews');
    }

    public function updateNews(Request $request)
    {
        dump($request->getPostList()->getValues());
        dump($request->getQueryList()->getValues());
        die('updateNews');
    }
}
