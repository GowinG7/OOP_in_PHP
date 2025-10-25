<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP in PHP</title>
</head>

<body>
    <?php
    require_once 'Classes/Car.php';

    // car class ko object jun Classes/Car.php file ma cha
    $car01 = new Car("BMW", "yellow");

    $car01->setBrand("Hissan");
    echo $car01->getBrand();

    echo "<br>";

    $car01->setColor("hotpink"); //not allowed color so it will display color which is set(passed as constructor argument) during object creation 
    echo $car01->getColor();

    ?>
</body>

</html>