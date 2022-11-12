<!DOCTYPE html>
<html lang="pt-BR"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>checkbox</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body style='background-image: url(VaquinhaXD.png)'>
        <?php

            $arr= array(

                'Lápis' => 3.00, 
                'Caderno' => 5.05,
                'Caneta' => 2.50,
                'Corretivo ' => 1.00,
                'Apontador' => 10.0,
                'Lapiseira' => 5.2
            
            );
            echo "<center>";
            echo "<form method ='POST'>";
            echo "
                <table border='1' style='background:white'>
            ";
            echo "
                <tr style='background-color:gray'>
                    <th> Produtos </th>
                    <th> Preço </th>
                </tr>
            ";
            
            foreach($arr as $key => $value){

                echo "<tr> <td>";
                    echo "
                        <input type='checkbox' name='check[]' value=".number_format($value, 2, '.', ',').">
                    ".$key;      
                echo "</td>";
                echo "<td>";
                    echo number_format($value, 2, '.', ',');
                echo "</td> </tr>";
                
            };
            
            echo "</table>";
            echo "<input type='submit' value='Calcular'>";
            echo "</form>";
            echo "</center>";
            
        ?>

        <?php

            $resultado = $_POST['check'];
            $soma = 0.0;
            $string = [];
            foreach($resultado as $key => $value){
        
                $soma += $value;    

            };
            echo "<center>";
            echo "
                <fieldset> 
                    <legend style='text-align:center'> Resultado </legend>
                     O resultado será: " .number_format($soma, 2, '.', ',') . "
                </fieldset>
            ";
            echo "</center>";

        ?>
    </body>
</html>