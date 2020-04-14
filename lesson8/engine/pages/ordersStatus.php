<?php
function indexAction(){
    if(!$_SESSION['is_admin'] || empty($_SESSION)){
        redirect('?p=index');
    }
    $content = "<h1>Все заказы</h1>" . "<a href=\"{$_SERVER['HTTP_REFERER']}\">Назад</a>";
    $sql = "SELECT id, user_id, address, status FROM `orders` ORDER BY `id` DESC";
    $result = mysqli_query(getConnect(), $sql);
    while($row = mysqli_fetch_assoc($result)){
        $content .= <<<html
            <form action="?p=ordersStatus&a=change&id={$row['id']}" method="post">
                <p>ID заказа: {$row['id']}</p>
                <p>ID пользователя: {$row['user_id']}</p>
                <p>Адрес доставки: {$row['address']}</p>
                <p>Текущий статус заказа: {$row['status']}</p>
                <input type="text" name="status">
                <input type="submit" value="Изменить статус">
            </form><hr>
html;
    }
    return $content;
}
function changeAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=ordersStatus', 'Что-то пошло не так');
        return;
    }

    $status = clearStrForGood($_POST['status']);

    $sql = "UPDATE `orders` SET `status` = '$status' WHERE `orders`.`id` = " . getId();
    mysqli_query(getConnect(), $sql);

    redirect('?p=ordersStatus', 'Статус заказа изменен');
}

?>

