<?
use Api\Engine\App;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    define('PUBLIC_AJAX_MODE', true);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
}

App::call()->run();
