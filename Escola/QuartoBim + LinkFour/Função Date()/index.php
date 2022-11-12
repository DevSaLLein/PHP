<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <div class="loader"></div>
    <form action="" method = "GET">
        <h1>Intervalo de horas</h1>
        <label for="d1">Agora</label>
        <input type="date" name="data1" onfocus> <br>

        <label for="d2">Dia futuro</label>
        <input type="date" name="data2"> <br>

        <label for="time1">Hora Atual</label>
        <input type="time" name="time1"> <br>

        <label for="time2">Hora futuro</label>
        <input type="time" name="time2"> 

        <input type="submit" value="Enviar">
    </form>

    <?php
    /*
        --PRIMEIRA TENTATIVA--

        #primeiro echo
        $data1 = $_GET["data1"];
        echo " Agora:  " . date($data1) . "<br>";

        #segundo echo
        $data2 = $_GET["data2"];
        echo " Futuro Digitado:  " . date($data2) . "<br>";

        #1week após
        echo "Após uma semana:  " . date($data1 , strtotime('+1week')) . "<br>";

        #Diferença entre as datas
        $dt1 = new DateTime($data1);
        $dt2 = new DateTime($data2);
        $difference = $data1->diff($data2);
        echo $difference;
        echo $difference->format('%R%a days');
    */
    function data($dt1 , $dt2 , $h1 , $h2){

        #Declarando as variáveis :)
        $dt1 = new DateTime($_GET["data1"]);
        $dt2 = new DateTime($_GET["data2"]);
        $inter = $dt1 -> diff($dt2);
        $h1 = strtotime($_GET['time1']);
        $h2 = strtotime($_GET['time2']);
        $diff = abs($h1 - $h2) / 3600;

        #Imprimindo os resultados :)
        echo $inter -> format('%R%a dias') . "  ";
        echo $diff;
    }
        #chamando a função com os valores declarados pelo internauta 
        data($_GET['data1'] , $_GET['data2'] , $_GET['time1'] , $_GET['time2']);

    ?>
</body>
</html>