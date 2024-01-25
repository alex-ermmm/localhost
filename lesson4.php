<?php

interface iCalc
{
    public function calcPriceKilometrs(int $km);
}

abstract class Tariff implements iCalc
{
    abstract public function calcTariffBase(int $priceKm, int $priceMinutes, array $added);

    abstract public function calcTariffHours(int $priceKm, int $priceMinutes, array $added);

    abstract public function calcTariffStudent(int $priceKm, int $priceMinutes, array $added);
}

class Calculator extends Tariff
{

    public function calcPriceKilometrs(int $km)
    {
        return " calcPriceKilometrs " . $km;
    }

    public function calcPriceMinutes(int $km)
    {
        return " calcPriceMinutes " . $km;
    }

    public function calcPriceHours(int $km)
    {
        return " calcPriceHours " . $km;
    }

    public function calcTariffBase(int $priceKm, int $priceMinutes, array $added)
    {
        $tariffBasePriceKm = 10;
        $tariffBasePriceMinutes = 3;
        $addedPrice = $this->additionalService($priceMinutes, $added);

        $sum = ($tariffBasePriceKm * $priceKm) + ($priceMinutes * $tariffBasePriceMinutes) + $addedPrice;
        return $sum;
    }

    public function calcTariffHours(int $priceKm, int $priceMinutes, array $added)
    {
        $tariffBasePriceKm = 0;
        $tariffBasePriceHours = 200;

        $hoursMinutes = ceil($priceMinutes / 60);
        $addedPrice = $this->additionalService($priceMinutes, $added);
        $return = ($tariffBasePriceKm * $priceKm) + ($hoursMinutes * $tariffBasePriceHours) + $addedPrice;
        return $return;
    }

    public function calcTariffStudent(int $priceKm, int $priceMinutes, $added)
    {
        $tariffBasePriceKm = 4;
        $tariffBasePriceMinutes = 1;

        $addedPrice = $this->additionalService($priceMinutes, $added);
        $return = ($tariffBasePriceKm * $priceKm) + ($priceMinutes * $tariffBasePriceMinutes) + $addedPrice;
        return $return;

    }

    public function additionalService($priceMinutes, $added)
    {
        $gps = 15;
        $driver = 100;
        $return = 0;

        if (in_array('gps', $added) == true) {
            if ($priceMinutes < 60) {
                $gpsPrice = 15;
            } else {
                $gpsPrice = ceil($priceMinutes / 60) * $gps;
            }
            $return += $gpsPrice;
        }

        if (in_array('driver', $added) == true) {
            $return += $driver;
        }

        return $return;
    }

}

$a = new Calculator;

echo "<h3>Тариф Базовый </h3> ";
echo "<p>" . $a->calcTariffBase(5, 80, ['driver', 'gps']) . " </p>";
echo "<h3>Тариф почасовой </h3> ";
echo "<p>" . $a->calcTariffHours(3, 80, ['driver']) . " </p>";
echo "<h3>Тариф студенческий </h3> ";
echo "<p> " . $a->calcTariffStudent(5, 100, ['driver']) . " </p>";

?>

