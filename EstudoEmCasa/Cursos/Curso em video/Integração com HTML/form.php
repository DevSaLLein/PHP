<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $cor = isset($_GET["cor"]) ? $_GET["cor"] : "black";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .estilo {
            color: <?php echo $cor ; ?>;
        }

    </style>
</head>
<body>
<?php
    $name = isset($_GET["name"]) ? $_GET["name"] : "[ Não informado]";
    $sexo = $_GET["sex"];

    echo" <div class= 'estilo'> 
        $name
    </div>";


    # Date(Y) -> Pegar o ano atual;
    # Date(y) -> Pegar o ano atual porém de forma resumida;
?> 

<button>
    <a href="home.html">Voltar</a>
</button>

</body>
</html>