<?php
function indexAction()
{
    $content = '<h1>Корзина</h1>';
    if (empty($_SESSION[GOODS])) {
        return $content . '<p>Товаров нет</p>';
    }

    foreach ($_SESSION[GOODS] as $goodId => $good) {
        $content .= <<<html
        <h2>{$good['name']}</h2>
        <p>
            {$good['count']}шт.
            <a href="?p=basket&a=add&id={$goodId}">+</a>
            <a href="?p=basket&a=del&id={$goodId}">-</a>
        </p>
        <p>{$good['price']}р.</p>
        <hr>
html;
    }
    $content .= <<<link
    <div>
        <a href="?p=createOrder">Перейти к оформлению заказа</a>
    </div>
link;

    return $content;
}

function addAction()
{
    $id = getId();
    $hasGood = hasGoodsForAddInBasket($id);

    if ($hasGood) {
        redirect("", 'Товар добавлен в корзину');
        return;
    }

    redirect('?p=goods', 'Что-то пошло не так');
    return;
}

function ajaxAddAction()
{
    header('Content-Type: application/json');
    $id = getId();
    $response = [
        'success' => hasGoodsForAddInBasket($id),
        'count' => countBasket()
    ];
    echo json_encode($response);
}

function delAction()
{
    $id = getId();
    if($_SESSION[GOODS][$id]['count'] === 1){
        unset($_SESSION[GOODS][$id]);
    }
    if($_SESSION[GOODS][$id]['count'] > 1){
        $_SESSION[GOODS][$id]['count'] -= 1;
    }
    redirect("", 'Товар удален из корзины');
}

function hasGoodsForAddInBasket($id)
{
    if (empty($id)) {
        return false;
    }

    if (!empty($_SESSION[GOODS][$id])) {
        $_SESSION['goods'][$id]['count']++;
        return true;
    }

    $sql = "SELECT id, name, info, price FROM goods WHERE id = " . $id;
    $result = mysqli_query(getConnect(), $sql);
    $good = mysqli_fetch_assoc($result);

    if (empty($good)) {
        return false;
    }

    $_SESSION[GOODS][$id] = [
        'name' => $good['name'],
        'price' => $good['price'],
        'count' => 1,
    ];

    return true;
}

