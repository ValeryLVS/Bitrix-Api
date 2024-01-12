<?php
$arUrlRewrite = array(
    1 =>
        array(
            'CONDITION' => '#^/api/([-0-9a-zA-Z]+)#',
            'RULE' => 'method=$1',
            'ID' => '',
            'PATH' => '/api/index.php',
            'SORT' => 100,
        ),
);
