<?php
abstract class Transport
{
    abstract protected function drive();
}

interface TransportInterface
{
    public function getType():string;

    public function getWheelFormula():string;

    public function getEngine():string;

    public function getTransmission():string;
}

trait Calculator
{
    public function calcEnginePower(int $engineVolume, float $meanEffectivePressure, int $rotationFrequency):float
    {
        return $engineVolume * $meanEffectivePressure * $rotationFrequency / 120;
    }
}

class Car extends Transport implements TransportInterface
{
    use Calculator;

    protected $type = 'sedan';

    protected $wheelFormula = '4x2';

    protected $engine = 'petrol';

    protected $transmission = 'auto';

    public function getType():string
    {
        return $this->type;
    }

    public function getWheelFormula():string
    {
        return $this->wheelFormula;
    }

    public function getEngine():string
    {
        return $this->engine;
    }

    public function getTransmission():string
    {
        return $this->transmission;
    }

    public function drive(){
        echo "Drive on road";
    }
}

$kia = new Car;
$kia->drive();
echo '<br>';
var_export($kia->getType());
echo '<br>';
var_export($kia->getWheelFormula());
echo '<br>';
var_export($kia->getEngine());
echo '<br>';
var_export($kia->getTransmission());
echo '<br>';
var_export($kia->calcEnginePower(1500, 0.9, 5000));


?>
