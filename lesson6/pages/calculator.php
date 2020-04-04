<form method="post">
    <input type="number" name="numberOne" required>
    <select name="method" id="">
        <option value="1">+</option>
        <option value="2">-</option>
        <option value="3">*</option>
        <option value="4">/</option>
    </select>
    <input type="number" name="numberTwo" required>
    <input type="submit">
</form>
<?php
$result = null;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $method = $_POST['method'];
    $numberOne = (int)$_POST['numberOne'];
    $numberTwo = (int)$_POST['numberTwo'];

    if($method === '1'){
        $result = $numberOne + $numberTwo;
    }
    if($method === '2'){
        $result = $numberOne - $numberTwo;
    }
    if($method === '3'){
        $result = $numberOne * $numberTwo;
    }
    if($method === '4' && $numberTwo !== 0){
        $result = $numberOne / $numberTwo;
    } elseif ($method === '4' && $numberTwo === 0){
        $result = 'Делить на ноль нельзя (можно только знатокам)';
    }
}

?>
<p>Oтвет: <?php
    if($result !== null){
        echo $result;
    }
    ?></p>
