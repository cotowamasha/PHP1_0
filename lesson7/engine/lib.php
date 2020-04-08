<?php

function getContent()
{
    $page = 'index';
    if (!empty($_GET['p'])) {
        $page = $_GET['p'];
    }

    $fileName = getFileName($page);

    if (!file_exists($fileName)) {
        $fileName = getFileName('index');
    }

    include $fileName;

    $action = 'index';
    if (!empty($_GET['a'])) {
        $action = $_GET['a'];
    }

    if (!function_exists($action . 'Action')) {
        $action = 'index';
    }

    $actionName = $action . 'Action';
    return $actionName();
}

function getFileName($file)
{
    return __DIR__ . "/pages/" . $file . '.php';
}

function getConnect()
{
    static $link;

    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '', 'lesson7');
    }

    return $link;
}


function getId()
{
    if (!empty($_GET['id'])) {
        return (int)$_GET['id'];
    }

    return 0;
}

//unset($_SESSION['goods'][12]);
