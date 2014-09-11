<?php
/**
 * 文件名：data03.php
 */

$phpGO网站     = new stdClass();
$phpGO网站->网址 = 'http://www.php-go.com';

//无需使用引用符号
$我的网站 = $phpGO网站;

//我们无论操作哪个变量名，操作的其实都是同一个数据。
$我的网站->网址 = 'http://www.dongww.com';

//输出的是改变后的网址。
echo $phpGO网站->网址 . PHP_EOL;

/**
 * 进行网址更改的函数。
 *
 * @param stdClass $网站  网站对象
 * @param string   $新网址 新的网址
 */
function 更改网址($网站, $新网址)
{
    $网站->网址 = $新网址;
}

更改网址($phpGO网站, 'http://example.com');

//输出的是改变后的网址。
echo $phpGO网站->网址;
