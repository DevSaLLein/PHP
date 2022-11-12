<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>
<body>
    <?php

        $arr = array(
            'Isaac' => 100,
            'Kelly'=> 50,
            'Erick' => 25,
            'Adrielly' => 5 
        );

        echo "
            <form method='POST'> 
                <select name='select'>    
        ";

        foreach($arr as $key => $value){
            echo "<option value=".$value."/".$key.">".$key."</option>";
        }

        echo "
            </select>
            <input type='submit' value='Enviar'/>
            </form>
        ";

    ?>
    <?php
        $resposta = $_POST['select'];
        $arrExplode = explode('/', $resposta);
        echo "A pessoa escolhida foi: $arrExplode[1] e o seu valor é: $arrExplode[0]";
    ?>
</body>
</html>