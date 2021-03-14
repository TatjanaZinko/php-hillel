<?php
/*
 * First Task
 */
//$arr = [5,7,4,[2,[2,3,2],3,1],8,[1,4],3];
$arr = [5,'text',4,[2,[2,3,2],3,1],8,[1,4],3];
$sum = 0;
function sum_second_element($arr, &$sum){
        $second_elem = next($arr);
        if (!is_array($second_elem)) {
            $num = (float) $second_elem;
            $sum += $num;
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
$string = 'агава';
$arr = preg_split('//u',$string,-1,PREG_SPLIT_NO_EMPTY);
$result = array_count_values($arr);
foreach ($result as $key=>$value) {
    echo $key . '=' . $value . '<br>';
}
?>

