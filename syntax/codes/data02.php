<?php
/**
 * 文件：data02.php
 */

/**
 * 以引用的方式将数据传入内部进行网址更改的函数。
 *
 * @param string $旧网址 旧的网址
 * @param string $新网址 新的网址
 */
function 更改网址(&$旧网址, $新网址)
{
    $旧网址 = $新网址;
}

$phpGO的网址 = 'http://www.php-go.com';

//调用函数，该函数内部的操作是以引用的形式，操作的是同一个数据。
更改网址($phpGO的网址, 'http://www.dongww.com');

//输出的是更改以后的新网址。
echo $phpGO的网址;