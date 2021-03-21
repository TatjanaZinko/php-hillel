<?php
//1 Task
abstract class Animals {
    abstract protected function eat();
}

//2 Task
abstract class Transport {
    abstract protected function drive();
}

//3 Task
class Predator extends Animals {
    public function eat(){
        echo "Eat meat" . "<br>";
    }
}

class Herbivorous extends Animals {
    public function eat(){
        echo "Eat grass" . "<br>";
    }
}

//4 Task
class Boat extends Transport {
    public function drive(){
        echo "Float on water" . "<br>";
    }
}

class Car extends Transport {
    public function drive(){
        echo "Drive on road" . "<br>";
    }
}

class Truck extends Transport {
    public function drive(){
        echo "Carry cargo" . "<br>";
    }
}

//5 Task

$lion = new Predator;
$lion->eat();

$goat = new Herbivorous;
$goat->eat();

$sailboat = new Boat;
$sailboat->drive();

$kia = new Car;
$kia->drive();

$daf= new Truck;
$daf->drive();

//6 Task

class ArrayHelper {

    static function firstElement(array $array) {
        return current($array);
    }

    static function removeZeroElement(array $array): array
    {
        return array_filter ($array, function ($var){
            return ($var !== 0);
        });
    }
}

//7 Task

class StringHelper {

    static function countLetter(string $string):void
    {
        $arr = preg_split('//u',$string,-1,PREG_SPLIT_NO_EMPTY);
        $result = array_count_values($arr);
        foreach ($result as $key=>$value) {
            echo $key . '=' . $value . '<br>';
        }
    }

}

class UserClass {
    function cleanArray (array $array): array
    {
        return ArrayHelper::removeZeroElement($array);
    }
    function returnFirst (array $array)
    {
        return ArrayHelper::firstElement($array);
    }
    function countStringLetter (string $string)
    {
        StringHelper::countLetter($string);
    }
}
$arr = [7, 'test', 5, 0];
$string = 'агава';
$obj = new UserClass;
var_export($obj->cleanArray($arr));
echo "<br>";
var_export($obj->returnFirst($arr));
echo "<br>";
$obj->countStringLetter($string);

?>
