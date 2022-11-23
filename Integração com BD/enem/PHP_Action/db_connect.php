<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IntegraçãoComBD</title>
    </head>
    
    <body>

        <?php

                
            $servername = "localhost";
            $database = "enem";
            $password = "";
            $username = "root";

            $connect = new mysqli(
                $servername, 
                $username, 
                $password, 
                $database
            );

            if( $connect -> connect_error){
                die ("A conexão falhou:". $connect -> connect_error);
            } else {
                echo "Minha conexão foi realizada com sucesso";
            }
        ?>
    </body>
</html>