<!doctype html>
<html lang="en">
<head>
    <style>
        img{
            max-width: 600px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="../index.php">Вернуться в галлерею</a><br>
<?php
$link = mysqli_connect('localhost', 'root', '', 'lesson5');
$sql = "SELECT id, link, `view` FROM images WHERE id = " . $_GET['id'];

$response = mysqli_query($link,$sql);

$row = mysqli_fetch_assoc($response);

$sql1 = "UPDATE `images` SET `view` = " . ++$row['view'] . " WHERE `images`.`id` = " . $_GET['id'];
$changeView = mysqli_query($link, $sql1);

echo '<img src="' . '../' . $row['link'] . '" alt="img">' . "<br>";
echo "Количество просмотров: " . $row['view'];

?>

</body>
</html>
