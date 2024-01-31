<?php

namespace Shop\Api;

use Bitrix\Main\Response;

/**
 * Bitrix\Main\Engine\Controller формирует AjaxResponse без важных заголовков.
 * Используйте этот трейт, если необходимы корректный json и заголовки Status, ContentType.
 */
trait JsonResponseTrait
{
    public function finalizeResponse(Response $response)
    {
        /* Код */
    }
}
