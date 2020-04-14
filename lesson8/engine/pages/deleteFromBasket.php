<?php
function indexAction(){
    if(!$_SESSION['is_admin'] || empty($_SESSION)){
        redirect('?p=index');
    }
    return <<<form
                <a href="{$_SERVER['HTTP_REFERER']}">Назад</a>
                <form action="?p=deleteFromBasket&a=delete" method="post">
                    <p>Введите id товара (ID можно посмотреть на странице товара)</p>
                    <input type="number" name="id">
                    <input type="submit" value="Удалить из каталога">
                </form>
form;
}
function deleteAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=deleteFromBasket', 'Что-то пошло не так');
        return;
    }
    $id = $_POST['id'];

    $sql = "SELECT id FROM goods WHERE id = " . $id;
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['id'] === null){
        redirect('?p=deleteFromBasket', 'Товара с таким ID нет');
    } else {
        $sql = "DELETE FROM `goods` WHERE `goods`.`id` =" . $id;
        mysqli_fetch_assoc(mysqli_query(getConnect(), $sql));
        redirect('?p=deleteFromBasket', 'Товар удален из каталога');
    }

}