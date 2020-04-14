<?php
function indexAction(){

    $sumCount = 0;
    $sumPrice = 0;
    foreach ($_SESSION[GOODS] as $goodId => $good){
        $sumCount += $good['count'];
        $sumPrice += $good['price'];
    }
    return <<<html
            <p>Товары в корзине: $sumCount</p>
            <p>Сумма заказа: $sumPrice</p>
            <form action="?p=createOrder&a=create" method="post">
            <p>Введите адрес доставки:</p>
                 <textarea name="address"  cols="30" rows="10" required></textarea>
                 <input type="submit" value="Оформить заказ">
            </form>
html;
}
function createAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=createOrder', 'Что-то пошло не так');
        return;
    }
    $address = clearStrForGood($_POST['address']);

    $sql = "INSERT INTO `orders` (`user_id`, `address`) VALUES ('{$_SESSION['user_id']}', '$address')";
    mysqli_query(getConnect(), $sql);
    $sql = "SELECT MAX(`id`) FROM `orders`";
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    foreach ($_SESSION[GOODS] as $goodId => $good){
        $sql= "INSERT INTO `order_items` (`order_id`, `good_id`, `count`, `price`) VALUES ({$row['MAX(`id`)']}, $goodId, {$good['count']}, {$good['price']})";
        mysqli_query(getConnect(), $sql);
    }
    unset($_SESSION[GOODS]);
    redirect('?p=userOrders', 'Заказ успешно добавлен');


}
?>

