<form method="post">
    <p>Первое число:</p>
    <input type="number" name="numberOne" required>
    <p>Второе число:</p>
    <input type="number" name="numberTwo" required>
    <input type="submit" value="+" name="method">
    <input type="submit" value="-" name="method">
    <input type="submit" value="*" name="method">
    <input type="submit" value="/" name="method">
</form>
<?php
$result = null;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $method = $_POST['method'];
    $numberOne = (int)$_POST['numberOne'];
    $numberTwo = (int)$_POST['numberTwo'];

    if($method === '+'){
        $result = $numberOne + $numberTwo;
    }
    if($method === '-'){
        $result = $numberOne - $numberTwo;
    }
    if($method === '*'){
        $result = $numberOne * $numberTwo;
    }
    if($method === '/' && $numberTwo !== 0){
        $result = $numberOne / $numberTwo;
    } elseif ($method === '/' && $numberTwo === 0){
        $result = 'Делить на ноль нельзя (можно только знатокам)';
    }
}
?>
<p>Oтвет: <?php
    if($result !== null){
        echo $result;
    }
    ?>
</p>

