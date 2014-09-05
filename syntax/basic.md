# 不得不提的语法

##标记

当 PHP 引擎解析文本的时候，它会试图寻找 PHP 特有的标记，并把包含在标记中的内容识别为 PHP 代码。

PHP 的代码一般会出现在两种地方。一种是纯 PHP 文件，另一种是嵌入在其他格式的文件中，
最常见的是 html 文件，但仍以 .php 为后缀名。

> 一个纯 PHP 文件往往是集中进行逻辑处理和计算的地方，而当嵌入到比如 html 文件中的时候，
> 该文件往往是作为一个视图文件而存在的，那么在这个文件中就不应该放置太多进行逻辑处理和计算的代码，
> 而应当尽可能地用来调取经过处理后的数据并显示它。

请看下面的代码：

~~~ .php

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

~~~

~~~ .php

<!-- basic01_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>今天的 TODO 列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<p>今天是：<?= today() ?>，今天该做的事情：</p>
<ul>
    <?php
    foreach ($todoList as $time => $event) {
        echo '<li>', $time, '：', $event, '</li>', PHP_EOL;
    }
    ?>
</ul>

</body>
</html>

~~~

上面列出了两个文件的代码，这两个文件其实是互相关联的。你可以试着运行一下 `basic01.php` 看看结果。

我们总共看到了三个部分的 PHP 代码。

首先是在 `basic01.php` 中，这是一个包含纯 PHP 代码的独立文件。
请注意，我们只使用了开始标记，而未使用结束标记。

> 如果文件内容是纯 PHP 代码，最好在文件末尾删除 PHP 结束标记。
> 这可以避免在 PHP 结束标记之后万一意外加入了空格或者换行符，会导致 PHP 开始输出这些空白，
> 而脚本中此时并无输出的意图。
> [出处](http://php.net/manual/zh/language.basic-syntax.phptags.php)

