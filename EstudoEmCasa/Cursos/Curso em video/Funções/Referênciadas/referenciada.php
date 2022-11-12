<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo "<h1> NORMAIS </h1>";
        $a = 5;

        function soma($x) {
            $x+= 2;
            echo "$x <br/>";
        }

        soma($a);

        echo "</br> $a <br/>";

        echo "<h1> REFERENCIADAS </h1>";

        $b = 5;

        function somaR(&$x) {
            $x += 2;
            echo " $x </br>";
        }

        somaR($b);

        echo  " </br>$b <br/>"

    ?>
</body>
</html>