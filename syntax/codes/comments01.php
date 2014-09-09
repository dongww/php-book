<?php
/**
 * 文件 comments01.php，用于处理日程列表的数据。
 *
 * @copyright Copyright (c) 2014 dongww <dongww@gmail.com>
 */

/**
 * 获得当天的日期，返回格式为 “年（4位）-月（2位）-日（2位）”
 *
 * @return string
 */
function today()
{
    $today = new DateTime();

    return $today->format('Y-m-d');
}

/**
 * 日程列表的数据
 *
 * @var array $todoList
 */
$todoList = [
    '09:00' => '调试代码',
    '14:00' => '完成 UML 制图',
    '17:00' => '下班去买菜',
];

//包含视图文件，并执行
require_once 'tags01_view.php';
