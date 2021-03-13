<?php
/*
 * First Task
 */
$arr = [5,7,4,[2,[2,3,2],3,1],8,[1,4],3];
$sum = 0;
function sum_second_element($arr, &$sum){
        if (!is_array($arr[1])) {
            $sum += $arr[1];
        }
    foreach ($arr as $key=>$value) {
        if (is_array($value)) {
            sum_second_element($value, $sum);
        }
    }
}
sum_second_element($arr, $sum);
echo 'Сумма всех вторых элементов равна: ' . $sum;
echo '<br>';
/*
 * Second Task
 */
$string = 'abhvava';
$arr = str_split($string);
$result = array_count_values($arr);
foreach ($result as $key=>$value) {
    echo $key . '=' . $value . '<br>';
}
?>

