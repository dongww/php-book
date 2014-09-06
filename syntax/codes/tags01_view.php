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
    <?php
    foreach ($todoList as $time => $event) {
        echo '<li>', $time, '：', $event, '</li>', PHP_EOL;
    }
    ?>
</ul>

</body>
</html>