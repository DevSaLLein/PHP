<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Escreva uma data: <input type="date" name="dt" >
        <input type="submit"  value="Enviar"> </br>
    </form>

    <?php
        $dataEscrita = $_POST['dt'];
        $nextWeek = time()  + 2 * (7 * 24 * 60 * 60);

        echo date('d-m-Y') . " <-Data Atual";
        echo "</br>";

        echo date('d-m-Y' , $nextWeek) . " <- Data +14, porém a data atual";
        echo "</br>";

        echo date('d-m-Y' , strtotime($dataEscrita) ) . " <- Data Escrita";
        echo "</br>";

        $dataF =   strtotime($dataEscrita)  +  strtotime(' + 2 week ');
       echo date('d-m-Y' , strtotime($dataF)) . " <- Data que tem que ser :/";

        $dataEscritaDate = new DateTime($_POST['dt']);
        $dataEscritaDate -> add();
        echo $dataEscritaDate -> format('d/m/Y');
    ?>
</body>
</html>