<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadrados :( #dificil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        $arr = array(
            'blue' => 'Azul',
            'red' => 'Vermelho',
            'yellow' => 'Amarelo',
            'green' => 'Verde'
        );

        echo "<form method='POST'>";
        foreach($arr as $key => $value){
            
            echo "
            <input type='radio' name='color' value=".$key." id=".$key."/>
            <label for=".$key.">".$key."</label> <br>
            ";
        }
        
        echo "
            <input type='submit' value='Escolher'/>
            </form>
        ";
        ?>

<?php
        $color = $_POST['color'];
        
    ?>


        <style>
            body {
                background-color: #121214;
                color: whitesmoke;
            }

            .square{
                background-color: <?php echo $color ?>;
                color: violet;
            }
        </style>
    
    <div class='square'>vfsg</div>
</body>
</html>