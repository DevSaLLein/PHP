<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">

    Nome: <input type="text" name="name">
    idade <input type="number" name="age" >
    <input type="submit" value="Enviar">
    </form>


     <?php
     
     function mostrar( $a , $b) {

       $s =   "Seu nome é $a e sua idade é $b anos";
       return $s; 

     }
     $imprimir = mostrar(
        isset( $_GET['name'] ) ? $_GET['name'] : '[Não informado]' , 
        isset( $_GET['age'] ) ? $_GET['age'] : '[Não informado]'
     );

     echo $imprimir;
     
     ?>
</body>
</html>