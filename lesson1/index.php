<?php
    $title = "Lesson1";
    $h1 = "Hello, Geekbrains!";
    $date = date("Y");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<?php
    echo "$h1<br>";
    echo $date . '<br>';

//    $a = 5;
//    $b = '05';
//    var_dump($a == $b); // происходит приведение типов к числу, 0 отсекается и 5 = 5 правда
//    var_dump((int)'012345');// по той же схеме int работает как Number() в js, приводит к числу строку и 0 отсекается
//    var_dump((float)(​123.0) ​​===​ (​i​nt)(​​123.0)); // float - это число с плавающей запятой, int - целое число, в php это разные типы переменной, а тк у нас строгое сравнение 123.0 === 123, то возвращает false
//    var_dump((i​nt)​​0​​===​(​i​nt)​('​hello, world')); //в php если первый символ строки буква, то она преобразуется в 0

    $c = 1;
    function foo(){
        return $d = 2;
    }
    $d = $c;
    $c = foo();

    echo $c; //2
    echo $d; //1
?>
</body>
</html>
