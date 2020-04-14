<?php

function indexAction(){
    return <<<form
        <form method="post" action="?p=registration&a=userAdd">
            <p>Ваш уникальный логин</p>
            <input type="text" name="login" required>
            <p>Ваша дата рождения</p>
            <input type="date" name="date">
            <p>Укажите пароль</p>
            <input type="password" name="password" required>
            <input type="submit" value="Регистрация">
        </form>
form;
}

function userAddAction(){

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=registration', 'Что-то пошло не так');
        return;
    }
    $login = clearStr($_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $date = $_POST['date'];
    $sql = "SELECT `login` FROM `users` WHERE login = '$login'";
    if(mysqli_fetch_assoc(mysqli_query(getConnect(), $sql)) === null){
        $sql = "INSERT INTO `users` (`login`, `password`, `date`) VALUES ('$login', '$password', '$date')";
        mysqli_query(getConnect(), $sql);
        redirect('?p=auth', 'Регистрация прошла успешно. Войдите в систему');
    } else {
        redirect('?p=registration', 'Пользователь с таким имененм уже есть');
    }
}

?>

