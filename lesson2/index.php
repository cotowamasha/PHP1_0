<?php

//задание 1

//echo $a = random_int(-100, 100) . "<br>";
//echo $b = random_int(-100, 100) . "<br>";
//
//if ($a >= 0 && $b >= 0){
//    echo $a - $b;
//}
//
//if ($a < 0 && $b < 0) {
//    echo $a * $b;
//}
//
//if (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
//    echo $a + $b;
//}

//задание 2

//$a = random_int(0, 15);
//
//switch ($a){
//    case 0:
//        echo '0 ';
//    case 1:
//        echo '1 ';
//    case 2:
//        echo '2 ';
//    case 3:
//        echo '3 ';
//    case 4:
//        echo '4 ';
//    case 5:
//        echo '5 ';
//    case 6:
//        echo '6 ';
//    case 7:
//        echo '7 ';
//    case 8:
//        echo '8 ';
//    case 9:
//        echo '9 ';
//    case 10:
//        echo '10 ';
//    case 11:
//        echo '11 ';
//    case 12:
//        echo '12 ';
//    case 13:
//        echo '13 ';
//    case 14:
//        echo '14 ';
//    case 15:
//        echo '15 ';
//}

//задание 3

//function sum($a, $b){
//    return ($a + $b) . "<br>" ;
//}
//
//function sub($a, $b){
//    return ($a - $b) . "<br>";
//}
//
//function mult($a, $b){
//    return ($a * $b) . "<br>";
//}
//
//function div($a, $b){
//    return ($a / $b) . "<br>";
//}
//
//echo sum(2, 5);
//echo sub(17, 10);
//echo mult(4, 8);
//echo div(225, 5);


//задание 4

//function mathOperation($arg1, $arg2, $operation){
//    switch ($operation){
//        case "+":
//            echo sum($arg1, $arg2);
//            break;
//        case "-":
//            echo sub($arg1, $arg2);
//            break;
//        case "*":
//            echo mult($arg1, $arg2);
//            break;
//        case "/":
//            echo div($arg1, $arg2);
//            break;
//    }
//}
//
//mathOperation(4, 5, '/');

//задание 5

//$year = date("Y");
//$html = file_get_contents('./main.php');
//echo str_replace('{year}', $year, $html);

// задание 6

//function power($val, $pow){
//    if ($pow === 1){
//        return $val;
//    } else {
//        return $val * power($val, $pow - 1);
//    }
//}
//
//echo power(2, 3);

// задание 7

//$G = "G";
//$i = "i";
$hour = date("G");


switch ($hour){
    case "0":
    case "5":
    case "6":
    case "7":
    case "8":
    case "9":
    case "10":
    case "11":
    case "12":
    case "13":
    case "14":
    case "15":
    case "16":
    case "17":
    case "18":
    case "19":
    case "20":
        echo $hour . " часов ";
        break;
    case "1":
    case "21":
        echo $hour . "час ";
        break;
    case "2":
    case "3":
    case "4":
    case "22":
    case "23":
        echo $hour . "часа ";
}

$minut = date("i");

switch ($minut){
    case "1":
    case "21":
    case "31":
    case "41":
    case "51":
        echo $minut . " минута";
        break;
    case "0":
    case "5":
    case "6":
    case "7":
    case "8":
    case "9":
    case "10":
    case "11":
    case "12":
    case "13":
    case "14":
    case "15":
    case "16":
    case "17":
    case "18":
    case "19":
    case "20":
    case "25":
    case "26":
    case "27":
    case "28":
    case "29":
    case "30":
    case "35":
    case "36":
    case "37":
    case "38":
    case "39":
    case "40":
    case "45":
    case "46":
    case "47":
    case "48":
    case "49":
    case "50":
    case "55":
    case "56":
    case "57":
    case "58":
    case "59":
        echo $minut . " минут";
        break;
    case "2":
    case "3":
    case "4":
    case "22":
    case "23":
    case "24":
    case "32":
    case "33":
    case "34":
    case "42":
    case "43":
    case "44":
    case "52":
    case "53":
    case "54":
        echo $minut . " минуты";
}
