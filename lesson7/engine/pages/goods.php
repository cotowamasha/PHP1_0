<?php
function indexAction()
{
    return allAction();
}

function oneAction()
{
    $sql = "SELECT id, `name`, price FROM goods WHERE id = " . getId();
    $result = mysqli_query(getConnect(), $sql);

    $row = mysqli_fetch_assoc($result);
    $html = <<<php
        <h1>{$row['name']}</h1>
        <p>{$row['price']}</p>
        <a href="?p=basket&a=add&id={$row['id']}">Добавить в корзину</a>
php;
    return $html;

}

function allAction()
{

    $sql = "SELECT id, `name`, price FROM goods";
    $result = mysqli_query(getConnect(), $sql);

    $html = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= <<<php
        <h1>{$row['name']}</h1>
        <p>{$row['price']}</p>
        <a href="?p=goods&a=one&id={$row['id']}">Подробнее</a>
        <a href="?p=basket&a=add&id={$row['id']}">Добавить в корзину</a>
        <hr>
php;
    }

    return $html;
}
