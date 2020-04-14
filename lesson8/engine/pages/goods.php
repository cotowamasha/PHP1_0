<?php
function indexAction()
{
    return allAction();
}

function oneAction()
{
    $id = getId();
    $sql = "SELECT id, name, info, price FROM goods WHERE id = " . $id;
    $result = mysqli_query(getConnect(), $sql);


    $row = mysqli_fetch_assoc($result);
    if($_SESSION['is_admin']){
        $html = <<<html
        ID товара: {$row['id']}<br>
        Товар: {$row['name']}<br>
        Информация: {$row['info']}<br>
        Цена: {$row['price']}<br>
        <a href="?p=basket&a=add&id=$id">Добавить в корзину</a>
        <hr>
        <a href="{$_SERVER['HTTP_REFERER']}">Назад</a>
html;
    }else {

        $html = <<<html
        Товар: {$row['name']}<br>
        Информация: {$row['info']}<br>
        Цена: {$row['price']}<br>
        <a href="?p=basket&a=add&id=$id">Добавить в корзину</a>
        <hr>
        <a href="{$_SERVER['HTTP_REFERER']}">Назад</a>
html;
}
    return $html;

}

function allAction()
{
    $sql = "SELECT id, name, info, price FROM goods";
    $result = mysqli_query(getConnect(), $sql);

    $html = '<script src="js/1.js"></script>';
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= <<<php
        Товар: {$row['name']}<br>
        Цена: {$row['price']}<br>
        <p onclick="addGoodInBasket({$row['id']})" style="cursor: pointer">add</p>
        <a href="?p=goods&a=one&id={$row['id']}">Подробнее</a>
        <hr>
php;
    }

    return $html;
}