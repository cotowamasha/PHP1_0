<?php
function indexAction()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $login = $_POST['login']; //логин admin
        $password = $_POST['password']; //пароль 111213
        $sql = "SELECT id, login, firstname, surname, password FROM users WHERE  login = '$login'";
        $result = mysqli_query(getConnect(), $sql);
        $row = mysqli_fetch_assoc($result);
        if(empty($row)){
            header('location /');
        }
        if(password_verify($password, $row['password'])){
            $_SESSION['auth'] = true;
        }
        header('location /');
    }
    if(!empty($_GET['exit'])){
        unset($_SESSION['auth']);
        header('location /');
    }
    $hello = '';
    if (!empty($_SESSION['auth'])){
        $hello .= <<<php
            Добро пожаловать, {$row['firstname']} {$row['surname']}
            <a href="?exit=1">Выйти</a>
php;
    } else {
        $hello .= <<<html
        <form method="post">
            <input type="text" name="login" placeholder="login" required>
            <input type="text" name="password" placeholder="password" required>
            <input type="submit" value="Войти">
        </form>
html;
    }
    return $hello;
}
?>


