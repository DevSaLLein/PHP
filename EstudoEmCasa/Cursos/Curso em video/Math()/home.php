<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math</title>
</head>
<body background-color="black">
    <center>
    <?php
    #Variáveis
    $n1 = isset($_GET['a']) ? $_GET['a'] : " [ Não informado]";
    $n2 = isset($_GET['b']) ? $_GET['b'] : " [ Não informado]";
    $soma = $n1 + $n2;
    $absoluto = abs($n1);
    $number = number_format($n1 , 2 , ',' , '.');
    $potencia = pow($n1 , $n2);
    $raizQuadrada = sqrt($n1);
    $soPraCima = ceil($n1);
    $soPraBaixo = floor($n1);
    $prosDoisLados = round($n1); 

    #ações!
    echo "<h1> Math() </h1> <h2> <br/>";
    echo "A soma entre o A e B é: $soma";
    echo "<br/> Estou devendo R$$number pro governo XD";
    echo "<br/> Olha a potencia do bixo: $potencia";
    echo " <br/> Achei a raiz quadrade!: $raizQuadrada";
    echo " 
        <br/> Olha os arredondamentos -> <br/>
        para cima: $soPraCima <br/>
        para baixo: $soPraBaixo <br/>
        para os dois lados: $prosDoisLados <br/>
    ";
    
  ?>  
  </center>
</body>
</html>