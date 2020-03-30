<?php
$uploaddir = "/img/";

echo '<pre>';

if(move_uploaded_file($_FILES['userfile']['tmp_name'], __DIR__ . $uploaddir . $_FILES['userfile']['name']) && ($_FILES['userfile']['type'] === 'image/gif' || $_FILES['userfile']['type'] === 'image/jpg' || $_FILES['userfile']['type'] === 'image/jpeg')) {
    echo "Файл корректен и был успешно загружен.\n";
}else {
    echo "Что-то пошло не так!\n";
}

echo "<a href='index.php'>Вернуться на главную</a>";
//echo 'Некоторая отладочная информация:';
//print_r($_FILES);
print "</pre>";
