<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $array = array('MC1 '  , 'MC2' , 'MC3');
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famosos</title>
</head>
<body>

    <form  method="get">
        <select name='select'>
            
        <?php 

            foreach($array as $key => $value){
                
                echo "<option name= " . $key . ">" 
                       . $value . 
                     "</option>";

            };
        echo "<input type='submit' value='Enviar'/>";
        echo "</select>";
        echo "</form>";  
        
        $resu = $_GET['select'];


        if($resu == 'MC1'){
            $mostrar = file_get_contents('Isaac.txt');
        } else if ($resu == 'MC2'){
            $mostrar = file_get_contents('jailson.txt');
        } else if($resu = 'MC3'){
            $mostrar = file_get_contents('melody.txt');
        }

        echo $mostrar;
        
        ?>



    </form>
    <?php
    


    ?>
</body>
</html>