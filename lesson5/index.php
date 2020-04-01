<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
echo '<pre>';

$link = mysqli_connect('localhost', 'root', '', 'lesson5');
$sql = "SELECT `id`, `link`, `name`, `size`, `view` FROM `images` ORDER BY `view` DESC";
$response = mysqli_query($link,$sql);

echo '<div class="images">';
while ($row = mysqli_fetch_assoc($response)) {
    echo '<div><a href="image.php/' . "?id={$row['id']}" .'"><img src="' . $row['link'] . '"></a>' . '<p>Количество просмотров: ' .  $row['view'] . '</p></div>' ;
}
echo '</div>';

print "</pre>";
?>




