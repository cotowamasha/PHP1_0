<?php
function indexAction()
{
    $cart = '';
    if(empty($_SESSION['cart'])){
        $cart = 'Корзина пуста';
    }
    foreach ($_SESSION['cart'] as $key => $value){
        $cart .= <<<cart
            <h3>{$value['name']}</h3>
            <p>{$value['price']}</p>
            <p>Количество: {$value['count']}</p>
            <a href="?p=basket&a=del&id={$key}">Удалить</a><hr>
            
cart;

    }
    return $cart;
}

function addAction()
{
    $sql = "SELECT id, `name`, price FROM goods WHERE id = " . getId();
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    if(empty($_SESSION['cart'][getId()])){
        $_SESSION['cart'][getId()] = $row;
        $_SESSION['cart'][getId()]['count'] = 1;
    } else {
        $_SESSION['cart'][getId()]['count'] += 1;
    }
    header('location: /?p=goods');
//    echo "<pre>";
//    var_dump($_SESSION);
//    echo "<pre>";
}

function delAction()
{
    if($_SESSION['cart'][$_GET['id']]['count'] === 1){
        unset($_SESSION['cart'][$_GET['id']]);
    }
    if($_SESSION['cart'][$_GET['id']]['count'] > 1){
        $_SESSION['cart'][$_GET['id']]['count'] -= 1;
    }
    header('location: /?p=basket');

}
