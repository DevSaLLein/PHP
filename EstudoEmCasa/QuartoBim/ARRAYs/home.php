<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Array</title>

    </head>
    <body style="background-imagem: url(Wallpaper.jpg)">
        <?php

            $arr = array(
                'Caderno' => 10,
                'Happy Potter( Livro )' => 100,
                'Mochila' => 50
            );

            echo "
                <form method='POST'> 
                    <table border='1'>
                        <tr> 
                            <th> Material </th>
                            <th> Valor</th
                        </tr>
                
            ";

            foreach($arr as $key => $value){

                echo "
                    <tr> 
                        <td> 
                            <input type='checkbox' name='array[]' value=". $value .">" . $key . " 
                        </td>
                "; 

                /*
                    quando se coloca no NAME um nome + [], você está dizendo que será um ARRAY e em 
                    cada posição terá como valor o $value;
                */

                echo "
                        <td>" 
                            . $value . "
                        </td> 
                    </tr>";

            }
            echo "</table>";
            echo "
                <label for='comprador'>
                    Nome do comprador
                </label>
                
                <input type='text' name='comp' id='comprador'>
            ";
            echo " <br> <input type='submit' value='Enviar'/>";
            echo "</form>";




        /*
            $arr = array(
                'Isaac', 'Beth', 'Levi'
            ); 
            array_push($arr, 'Cesar');
            array_unshift($arr, 'Furão');

            foreach($arr as $key => $value){
                echo "$key -> $value";
                echo "</br>";
            };
        */
        ?>

        <?php
            // Pegando o ARRAY;
            $valor = $_POST['array'];
            $soma = 0;
            $comp = $_POST['comp'];

            /* 
                Somando todos os valores que estão dentro do ARRAY e vos 
                colocando numa variável antes criada para que possa começar com o valor 0;
            */

            foreach($valor as $key => $value){

                $soma += $value;
            }

            // Imprimindo o resultado da soma;
            echo "valor a se pagar será: $soma";
            echo "</br>  O seu nome é: $comp, seja bem-vindo(a)";
            echo "</br>Volte sempre!";


        ?>
    </body>
</html>