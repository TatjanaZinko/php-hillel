<?php
abstract class Transport
{
    abstract protected function drive();
}

interface TransportBodyType
{
    public function getType():string;
}

interface TransportWheelFormula
{
    public function getWheelFormula():string;
}

interface TransportEngineType
{
    public function getEngine():string;
}

interface TransportTransmission
{
    public function getTransmission():string;
}


trait Calculator
{
    public function calcEnginePower(int $engineVolume, float $meanEffectivePressure, int $rotationFrequency):float
    {
        return $engineVolume * $meanEffectivePressure * $rotationFrequency / 120;
    }
}

class Car extends Transport implements TransportBodyType, TransportWheelFormula, TransportEngineType, TransportTransmission
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
