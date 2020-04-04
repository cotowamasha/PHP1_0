<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $text = $_POST['text'];
    $sqlText = "INSERT INTO `reviews` (`image_id`, `text`) VALUES ('$id', '$text')";
    mysqli_query($link, $sqlText);
    header("Location: ?page=3&id=$id");
}

$sql = "SELECT id, link, `name`, `view` FROM images WHERE id = " . getId();

$result = mysqli_query($link, $sql);


$row = mysqli_fetch_assoc($result);
$sql1 = "UPDATE `images` SET `view` = " . ++$row['view'] . " WHERE `images`.`id` = " . getId();
$changeView = mysqli_query($link, $sql1);
    $html = <<<php
        <img class='maxi' src='{$row['link']}'>
        <h3>Просмотры: {$row['view']}</h3>
php;
echo $html;

$sqlReviews = "SELECT id, text, image_id FROM reviews WHERE image_id = " . getId();
$resultReviews = mysqli_query($link, $sqlReviews);
echo "<h1>Отзывы</h1>";
while($row = mysqli_fetch_assoc($resultReviews)){
    $html = <<<php
        <p>{$row['text']}</p><hr>
php;
    echo $html;
}

?>
<form method="post">
    <textarea name="text" cols="30" rows="10" maxlength="250"></textarea>
    <input type="submit">
</form>



