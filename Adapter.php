<?php
//Внешняя библиотека:
class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        return (M_PI * $diagonal**2)/4;
   }
}

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        return ($diagonal**2)/2;
    }
}


//Имеющиеся интерфейсы:
interface ISquare
{
    function squareArea(int $sideSquare);
}

interface ICircle
{
    function circleArea(int $circumference);
}

class SquareArea implements ISquare {
    protected SquareAreaLib $area;

    function __construct()
    {
        $this->area = new SquareAreaLib();
    }

    public function squareArea(int $sideSquare)
    {
        $diagonal = sqrt(2) * $sideSquare;
        return $this->area->getSquareArea($diagonal);
    }
}

class CircleArea implements ICircle {
    protected CircleAreaLib $area;

    function __construct() {
        $this->area = new CircleAreaLib();
    }

    public function circleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        return $this->area->getCircleArea($diagonal);
    }
}

$circle = new CircleArea();
$square = new SquareArea();

echo $circle->circleArea(50);
echo "\n";
echo $square->squareArea(10);