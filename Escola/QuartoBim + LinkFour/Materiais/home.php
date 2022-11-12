<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style='background: #121214;'>
    <?php
        $mat = array(
            'Caderno' => 10,
            'Lápis' => 2.50,
            'Caneta' => 3.50,
            'Caderno_Inteligente' => 15.5,

        );

        echo "
            <form method='POST' action='home.php'>
        ";

        foreach( $mat as $key => $value){
            echo "
                <input type='radio' id=".$key." name='material' value=".$key.'/'.$value."/>
                <label for=".$key.">".$key."<label/> </br>
            ";
        }

        echo "
            <input type='submit' value='Enviar' id='button'>
            </form> <br> <br>
        "; 
    ?>

    <?php
        $arr = $_POST['material'];
        
        $array = explode('/', $arr);
        echo $array[0];
        echo " e o valor é R$: ". number_format($array[1], 2, '.', ',');

    ?>
</body>
</html>