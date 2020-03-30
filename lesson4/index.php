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

<form name="upload" action="download.php" method="POST" ENCTYPE="multipart/form-data">
    Выберите файл для загрузки:
    <input type="hidden" name="MAX_FILE_SIZE" value="6291456">
    <input type="file" name="userfile">
    <input type="submit" name="upload" value="Загрузить">
</form>

<?php

function gallery($path = 'img'){
    $imgs = scandir($path);
    echo "<div class='images'>";
    foreach ($imgs as $img){
        if(($img !== ".") && ($img !== "..") && ($img[0] !== ".")){
            $item = 'img/' . $img;
            echo "<a href={$item}><img src={$item}></a>";
        }
    }
    echo "</div>";
}
echo gallery();

$file = fopen('log/log.txt', 'a');
fwrite($file, date('Y.m.d G:i') . PHP_EOL);
fclose($file);

function lines($file)
{
    if(!file_exists($file)){
        exit("Файл не найден");
    }
    $file_arr = file($file);

    $lines = count($file_arr);

    return $lines;
}

echo lines("log/log.txt");
$i = 1;
function createNewFile($i){

    if(lines("log/log.txt") === 10){
        copy('log/log.txt', "log/log$i.txt");
        file_put_contents('log/log.txt', '');
        }

}
createNewFile($i);
$i = $i + 1;
?>

</body>
</html>




