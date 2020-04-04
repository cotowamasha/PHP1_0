<?php
    $link = mysqli_connect('localhost', 'root', '', 'lesson5');
    include 'config/lib.php';
    $pages = include 'config/pages.php';
    $page = getPage($pages);

    ob_start();
    include 'pages/' . $page;
    $content = ob_get_clean();

    $html = file_get_contents('main.html');
    echo str_replace('{{CONTENT}}', $content, $html);


