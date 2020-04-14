<?php
function indexAction(){
    $content = "<h1>Заказы</h1>";

    $sql = "SELECT id, user_id, address, status FROM `orders` WHERE user_id = " . $_SESSION['user_id'];
    $result = mysqli_query(getConnect(), $sql);
    while ($orders = mysqli_fetch_assoc($result)){
            $sql1 = "SELECT id, order_id, good_id, count, price FROM order_items WHERE order_id = " . $orders['id'];
            $result1 = mysqli_query(getConnect(), $sql1);
            $sumPrice = 0;
            $sumCount = 0;
            while ($row = mysqli_fetch_assoc($result1)){
                $sumPrice += (int)$row['price'];
                $sumCount += $row['count'];
            }
            $content .= <<<html
                    <p>Сумма заказа: $sumPrice</p>
                    <p>Количество товаров: $sumCount</p>
                    <p>Адрес доставки: {$orders['address']}</p>
                    <p>Статус заказа: {$orders['status']}</p><hr>

html;
    }
    return $content;
}

