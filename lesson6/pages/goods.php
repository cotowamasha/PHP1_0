<?php
$sql = "SELECT id, link, `name`, `view` FROM images ORDER BY `view` DESC";
$result = mysqli_query($link, $sql);

$html = '';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= <<<php
        <a href="?page=3&id={$row['id']}"><img class='mini' src='{$row['link']}'></a>
        <h4>Просмотры: {$row['view']}</h4>
        <hr>
php;
}

echo $html;
