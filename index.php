<?php

class MainClass
{
    public array $randomNumbers = [];

    public int $numberOne;

    public int $numberTwo;

    public function __construct()
    {
        $this->randomNumbers = array_rand(range(1, 20), 10);

        $indexes = array_rand($this->randomNumbers, 2);

        $this->numberOne = $this->randomNumbers[$indexes[0]];
        $this->numberTwo = $this->randomNumbers[$indexes[1]];
    }

    public function sumOfTwoNumbers(): int
    {
        return $this->numberOne + $this->numberTwo;
    }

    public function sort($order = 'ASC'): void
    {
        $order === 'ASC'
            ? sort($this->randomNumbers)
            : rsort($this->randomNumbers);
    }

    public function average(): float
    {
        return array_sum($this->randomNumbers) / count($this->randomNumbers);
    }

    public function getNumberOne(): int
    {
        return $this->numberOne;
    }

    public function getNumberTwo(): int
    {
        return $this->numberTwo;
    }
}

class ChildClass extends MainClass
{
    public function sumOfTwoNumbers(): int
    {
        return $this->randomNumbers[0] + $this->randomNumbers[count($this->randomNumbers) - 1];
    }
}

$mainClass = new MainClass();
$childClass = new ChildClass();

echo "<h3>List of random numbers</h3>";
foreach ($mainClass->randomNumbers as $number) {
    echo $number . " ";
}
echo PHP_EOL;

echo "<h3>Descending Order</h3>";
$mainClass->sort('DESC');
foreach ($mainClass->randomNumbers as $number) {
    echo $number . " ";
}
echo PHP_EOL;

echo "<h3>Ascending Order</h3>";
$mainClass->sort();
foreach ($mainClass->randomNumbers as $number) {
    echo $number . " ";
}
echo PHP_EOL;

echo "<h3>Sum of two numbers ({$mainClass->numberOne} and {$mainClass->numberTwo})</h3>";
echo $mainClass->sumOfTwoNumbers();
echo PHP_EOL;

echo "<h3>Average</h3>";
echo $mainClass->average();
