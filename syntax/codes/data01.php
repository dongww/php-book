<?php
/**
 * 文件：data01.php
 */

//'http://www.php-go.com' 是数据，'$phpGO的网址' 是数据的名称。
$phpGO的网址 = 'http://www.php-go.com';

//下面一行代码是引用的语法，相当于给数据起了个别名：$我的网站，现在数据有了两个名字，即两个变量名。
$我的网站 = & $phpGO的网址;

//我们无论操作哪个变量名，操作的其实都是同一个数据。
$我的网站 = 'http://www.dongww.com';

//输出的是改变后的网址。
echo $phpGO的网址;