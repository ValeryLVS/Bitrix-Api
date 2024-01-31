<?php

namespace Shop\Api;

use Bitrix\Main\Engine\Controller;

class DeviceController extends Controller
{
    use JsonResponseTrait;

    public function getDefaultPreFilters(): array
    {
        return [];
    }

    public function deviceByIdsAction($id): array
    {
        /* Код */

        return [];
    }

    public function devicesAction(): array
    {
        /* Код */

        return [];
    }
}