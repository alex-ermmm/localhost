<?php
include "src/ServiceInterface.php";
include "src/TariffInterface.php";
include "src/TarriffAbstract.php";
include "src/TariffBasic.php";
include "src/ServiceGPS.php";
include "src/ServiceDriver.php";
include "src/TariffHours.php";
include "src/TariffStudent.php";

/** @var TariffInterface $tariff */
$tariff = new TariffBasic(5, 60);
$tariff->addService(new ServiceGPS(15));
$tariff->addService(new ServiceDriver(100));

echo $tariff->countPrice();
echo "<br>";

$tariff = new TariffHours(5, 61);
echo $tariff->countPrice();

echo "<br>";

$tariff = new TariffStudent(5, 61);
$tariff->addService(new ServiceDriver(100));
echo $tariff->countPrice();
?>

