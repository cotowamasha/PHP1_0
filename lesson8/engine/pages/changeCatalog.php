<?php
function indexAction(){
    if(!$_SESSION['is_admin'] || empty($_SESSION)){
        redirect('?p=index');
    }
    return <<<html
            <a href="{$_SERVER['HTTP_REFERER']}">Назад</a>
            <form action="?p=changeCatalog&a=add" method="post">
                <p>Название товара</p>
                <input type="text" name="name" required>
                <p>Информация о товаре</p>
                <textarea name="info" cols="30" rows="10" required></textarea>
                <p>Цена</p>
                <input type="number" name="price" required> р. <br>
                <input type="submit" value="Добавить в каталог">
            </form>
html;
}

function addAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=changeCatalog', 'Что-то пошло не так');
        return;
    }
    $name = clearStrForGood($_POST['name']);
    $info = clearStrForGood($_POST['info']);
    $price = $_POST['price'];

    $sql = "INSERT INTO `goods` (`name`, `info`, `price`) VALUES ('$name', '$info', '$price')";
    mysqli_query(getConnect(), $sql);
    redirect('?p=changeCatalog', 'Товар добавлен');
}

?>


