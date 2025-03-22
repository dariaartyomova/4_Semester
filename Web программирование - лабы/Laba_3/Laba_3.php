<?php
/* Imagine a lot of code here */
$very_bad_unclear_name = "15 chicken wings";

// Write your code here:
 #1
$order =& $very_bad_unclear_name; 
$order .= "Hii!";
echo "$very_bad_unclear_name";

#2 
$k = 23;
echo "$k"
echo "\n";

$k1 = 1.123;
echo "$k1";
echo "\n";

echo 10 + 2;
echo "\n";

$lastMonth = 15000;
$thisMonth = 14000;
echo $lastMonth - $thisMonth;

#3
$numLanguages = 4;
$months = 11;
$days = $months * 16;
$daysPerLanguage = $days / $numLanguages;
echo "$daysPerLanguage\n";

#4
echo 4**2;

#5
$myNum = 23
$answer = $MyNum

$answer += 2;
$answer *= 2;
$answer -= 2;
$answer /= 2;
$answer -= $myNum;
echo $answer;

#6
$a=10;
$b=3;
$c = $a % $b;
$d = $a / $b;
echo "$c\n";

if ($a % $b == 0) echo "Äåëèòñÿ: $d\n";
else echo "Äåëèòñÿ ñ îñòàòêîì: $c\n";

$st = pow(2, 10);
echo "$st\n";
$sq = sqrt(245);
echo "$sq\n";

$arr = Array(4, 2, 5, 19, 13, 0, 10);
$n = 0;
foreach ($arr as $element) $n += ($element**2);
$n = sqrt($n);
echo "$n\n";

$num = sqrt(379);
$num1 = round($num, 0);
echo "$num1\n";
$num2 = round($num, 1);
echo "$num2\n";
$num3 = round($num, 2);
echo "$num3\n";

$array = Array("floor"=> floor(sqrt(587)), "ceil"=> ceil(sqrt(587)));
echo $array["floor"]."\n";
echo $array["ceil"]."\n";

echo "Min: ".min(4, -2, 5, 19, -130, 0, 10)."\n";
echo "Max: ".max(4, -2, 5, 19, -130, 0, 10)."\n";
echo "Random: ".random_int(1, 100)."\n";

$arr1 = Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
for($i = 0; $i < 10; $i++) {
    $arr1[$i] = random_int(1, 100);
    echo "Random number $i: ".$arr1[$i]."\n";
}

$a = -16;
$b = 10;
echo "abs: ".abs($a - $b)."\n";

$arr = Array(1, 2, -1, -2, 3, -3);
foreach($arr as $element) {
    $element = abs($element);
    echo "Element: ".$element."\n";
}

$num = 30;
$arr = Array(1);
for($i = 2; $i < $num / 2 + 1 ; $i++) 
    if ($num % $i == 0) array_push($arr, $i);

array_push($arr, $num);
print_r($arr);

$arr = Array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$sum = 0;
for ($i = 0; $i < 10; $i++) {
    if ($sum > 10) {
        echo $i."\n";
        break;
    }

    $sum += $arr[$i];

#7
function printStringReturnNumber() {
    echo "Âàøå ÷èñëî:";
    return 5;
}
$my_num = printStringReturnNumber();
echo $my_num."\n";

#8
function increaseEnthusiasm(string $str) {
    return $str."!";
}
echo increaseEnthusiasm("Hii")."\n";

function repeatThreeTimes(string $str) {
   return $str.$str.$str;
}
echo repeatThreeTimes("sure")."\n";
echo increaseEnthusiasm(repeatThreeTimes("or"))."\n";
function cut(string $str, int $symbols = 10) {}

function printArrayRecursively($array, $index = 0) {
    if ($index >= count($array)) {
        return;
    }

    echo $array[$index] . "\n";
    printArrayRecursively($array, $index + 1);
}

$numbers = [1, 2, 3, 4, 5];
printArrayRecursively($numbers);

function Sum($number) {
    $digits = str_split((string)$number);

    $sum = array_sum($digits);

    if ($sum > 9) {
        return Sum($sum);
    }

    return $sum;
}
$number = 1984;
echo "Èòîãîâàÿ ñóììà: " . Sum($number)."\n";

#9
$array = [];
for ($i = 1; $i <= 5; $i++) {
    $array[] = str_repeat('x', $i);
}
print_r($array);

function arrayFill($value, $count) {
    return array_fill(0, $count, $value);
}

$result = arrayFill('x', 5);
print_r($result);

$array = [[1, 2, 3], [4, 5], [6]];
$sum = 0;

foreach ($array as $subArray) {
    $sum += array_sum($subArray);
}

echo "$sum\n";

$array = [];
$count = 1;

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $array[$i][$j] = $count++;
    }
}

print_r($array);

$array = [2, 5, 3, 9];
$result = ($array[0] * $array[1]) + ($array[2] * $array[3]);
echo "$result\n";

$user = [
    'name' => 'Èâàí',
    'surname' => 'Èâàíîâ',
    'patronymic' => 'Èâàíîâè÷'
];

echo $user['surname'] . ' ' . $user['name'] . ' ' . $user['patronymic']."\n";

$date = [
    'year' => date('Y'),
    'month' => date('m'),
    'day' => date('d')
];

echo $date['year'] . '-' . $date['month'] . '-' . $date['day']."\n";

$arr = ['a', 'b', 'c', 'd', 'e'];
echo "Êîëè÷åñòâî ýëåìåíòîâ â ìàññèâå: " . count($arr)."\n";
echo "Ïîñëåäíèé ýëåìåíò ìàññèâà: " . end($arr)."\n";
echo "Ïðåäïîñëåäíèé ýëåìåíò ìàññèâà: " . $arr[count($arr) - 2]."\n";

#10
function isSumGreaterThanTen($a, $b) {
    return ($a + $b) > 10;
}

var_dump(isSumGreaterThanTen(7, 6)); 
var_dump(isSumGreaterThanTen(1, 3));

function areNumbersEqual($a, $b) {
    return $a == $b;
}

var_dump(areNumbersEqual(5, 5));
var_dump(areNumbersEqual(4, 3)); 

$test = 0;
echo $test == 0 ? 'âåðíî'."\n" : ''."\n";

$age = 50; 

if ($age < 10 || $age > 99) {
    echo "×èñëî ìåíüøå 10 èëè áîëüøå 99.\n";
} else {
    $sum = array_sum(str_split((string)$age));
    if ($sum <= 9) {
        echo "Ñóììà öèôð îäíîçíà÷íà: $sum\n";
    } else {
        echo "Ñóììà öèôð äâóçíà÷íà: $sum\n";
    }
}

$arr = [1, 2, 3]; 

if (count($arr) == 3) {
    echo "Ñóììà ýëåìåíòîâ ìàññèâà: " . array_sum($arr)."\n";
} else {
    echo "Â ìàññèâå íå 3 ýëåìåíòà.\n";
}

#11
for ($i = 1; $i <= 20; $i++) {
    echo str_repeat('x', $i) . "\n";
}

#12
$array = [1, 2, 3, 4, 5];
$average = array_sum($array) / count($array);
echo "Ñðåäíåå àðèôìåòè÷åñêîå: $average\n";

$sum = array_sum(range(1, 100));
echo "Ñóììà ÷èñåë îò 1 äî 100: $sum\n";

$array = [1, 4, 9, 16, 25];
$sqrtArray = array_map('sqrt', $array);
print_r($sqrtArray);

$keys = range('a', 'z');
$values = range(1, 26);
$alphabetArray = array_combine($keys, $values);
print_r($alphabetArray);

$str = '1234567890';
$pairs = str_split($str, 2);
$sum = array_sum($pairs);
echo "Ñóììà ïàð ÷èñåë: $sum\n";



// Don't change the line below
echo "\nYour order is: $very_bad_unclear_name.";
