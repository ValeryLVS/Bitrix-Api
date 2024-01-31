<?php

use Api\Engine\Autoload;

//Автозагрузка классов для Api TODO возможно реализовать иначе (через модуль либо composer)
spl_autoload_register([new Autoload(), 'loadClass']);