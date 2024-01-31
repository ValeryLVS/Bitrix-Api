<?php
//Autoload API
if(file_exists($_SERVER["DOCUMENT_ROOT"]."/local/Api/Engine/Autoload.php")){
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/Api/Engine/Autoload.php");
}
//Autoload DEFAULT
if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/autoload.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/autoload.php");
}