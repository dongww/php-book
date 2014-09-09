#PHP 标记

当 PHP 引擎解析文本时，会试图寻找 PHP 的特有标记。完整的标记包含开始和结束两部分： `<?php` 及 `?>`，其中代码将被解析。
若解析器未寻获结束标记，则会一直解析，直至文件结束。

PHP 代码通常以两种形式出现。其一为纯 PHP 文件，其二可嵌入到其他格式中，例如 html 格式。

> 在设计合理的项目中，复杂的逻辑处理往往置于纯 PHP 文件中，以使其与视图文件分离。
> 当 PHP 嵌于视图部分时，尽量不要涉及太多数据处理。而应只承担调取处理后的数据并输出它的责任。

请看下面的代码：

~~~ .php

<?php
//tags01.php

function today()
{
    $today = new DateTime();

    return $today->format('Y-m-d');
}

$todoList = [
    '09:00' => '调试项目1的代码',
    '14:00' => '完成项目2的 UML 制图',
    '17:00' => '下班去买菜',
];

require_once 'tags01_view.php';

~~~

~~~ .php

<!-- tags01_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>今天的 TODO 列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<p>今天是：<?= today() ?>，今天该做的事情：</p>
<ul>
    <?php foreach ($todoList as $time => $event): ?>
        <li><?= $time ?>：<?= $event ?></li>
    <?php endforeach ?>
</ul>

</body>
</html>

~~~

上述为两个代码文件，相互关联，可尝试运行 `tags01.php` 以观其结果。

`tags01.php` 是一个纯 PHP 代码文件。请注意，这里我们仅使用了开始标记。

> 如果文件内容是纯 PHP 代码，最好在文件末尾删除 PHP 结束标记。
> 这可以避免在 PHP 结束标记之后万一意外加入了空格或者换行符，会导致 PHP 开始输出这些空白，
> 而脚本中此时并无输出的意图。出处：
[http://php.net/manual/zh/language.basic-syntax.phptags.php](http://php.net/manual/zh/language.basic-syntax.phptags.php)。

在 `tags01_view.php` 中，我们看到了几对特殊的标记 `<?=` 及 `?>`，此为简便写法，谓之短标记，
其用于输出表达式的结果，等同于 `<?php echo '...' ?>` 。在视图文件中，每一个相对独立的数据输出都应放置在独立的这对短标记中，以使代码清晰。
另还有一对短标记： `<?  ?>`，用于替代 `<?php ?>`，但随着 PHP 语法的标准化，已等同于废除，在 PHP 配置中，也被默认禁用。

> `<?= ?>` 这对标记可谓一波三折。曾由于短标记被默认禁用，其也受到牵联。
> 当 PHP 文件用作视图使用的时候，这种短标记其实是行之有效且清晰易读的，
> 于是在 PHP 5.4 中，又被默认启用，且无法禁用。

`tags01_view.php` 里面 `foreach` 的写法有点特殊，没有使用通常的大括号。
当 PHP 代码用于嵌入时，应当选择这种写法，它会使代码看上去更加简洁易读。

之前说过，当 PHP 嵌于视图文件中的时候，不应进行太多的数据处理。但类似于调用函数这种一目了然的代码，完全没有理由拒绝。
另外，类似于判断和循环这种基本的逻辑处理，在视图中实无法避免，只要保证代码简短清晰即可。
总之记住一点：**数据处理尽量与视图分离，代码可读性要强，最好一目了然**。