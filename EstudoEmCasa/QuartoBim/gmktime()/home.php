<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gmmktime</title>
</head>
<body>
    <?php
    ?>


    <?php
        $data1 = mktime( 23, 30, 22, 05, 25, 2010 );
        $data2 = mktime( 23, 30, 22, 05, 26, 2010 );
        $diff = ($data2 - $data1) / (60 * 60);

        echo "diferença de horas dentre as duas datas dadas: ".$diff. "Horas <br>";

        echo date('d-m-Y', $data1);
        echo"----". date('H:m:s', $data1). "<br>";

        echo date('d-m-Y', $data2);
        echo"----". date('H:m:s', $data2);
    ?>
</body>
</html>