<?php
//basic01.php

function today()
{
    $today = new DateTime();

    return $today->format('Y-m-d');
}

$todoList = [
    '09:00' => '调试代码',
    '14:00' => '完成 UML 制图',
    '17:00' => '下班去买菜',
];

require_once 'basic01_view.php';
