<?php

function indexAction()
{
    if ($_SESSION[AUTH] && $_SESSION['is_admin']) {
        return <<<html
        <h1>Привет</h1>
            <a href="?p=changeCatalog">Добавить товар в каталог</a><br>
            <a href="?p=deleteFromBasket">Удалить товар из каталога</a><br>
            <a href="?p=ordersStatus">Просмотреть и изменить статусы заказов</a><br>
        <a href="?p=auth&a=logout">Выход</a>
html;
    }
    if(($_SESSION[AUTH] && !$_SESSION['is_admin'])){
        return <<<html
        <h1>Привет</h1>
        <a href="?p=userOrders">Мои заказы</a><br>
        <a href="?p=auth&a=logout">Выход</a>
html;
    }

return <<<form
    <form method="post" action="?p=auth&a=login">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="submit">
    </form>
    <h3>У вас еще нет аккаунта?</h3><a href="?p=registration">Зарегистрироваться</a>
form;
}

function logoutAction()
{
    session_destroy();
    redirect('?p=auth');
}

function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=auth', 'Что-то пошло не так');
        return;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        redirect('?p=auth', 'Не все данные переданы');
        return;
    }

    $login = clearStr($_POST['login']);
    $password = $_POST['password'];

    $sql = "SELECT id, login, password, is_admin FROM users WHERE login = '$login'";
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row)) {
        redirect('?p=auth', 'Не верный логин или пароль');
        return;
    }

    if (password_verify($password, $row['password'])) {

        if($row['is_admin'] === 'true'){
            $_SESSION[AUTH] = true;
            $_SESSION['is_admin'] = true;
            $_SESSION['user_id'] = $row['id'];

        } else {
            $_SESSION[AUTH] = true;
            $_SESSION['is_admin'] = false;
            $_SESSION['user_id'] = $row['id'];
        }
    }

    redirect('?p=auth', 'Добро пожаловать!');
}

?>


