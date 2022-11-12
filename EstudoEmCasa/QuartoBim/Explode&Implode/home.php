<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Treinando Explode e Implode">
        <title>Explode e Implode</title>
    </head>
    <body>
        <?php

            $state = 'Ceará/CE/Brasil';

            #pegar APENAS o estado;
            $arrayState = explode('/', $state);
            var_dump($arrayState); // array(0) => 'Ceará' ; array(1) => 'CE';
            echo "</br>" . ($arrayState[0]);
            echo "</br>" . ($arrayState[1]);

            #Juntar tudo novamente;
            $tudoJunto =  implode('=>', $arrayState);
            echo "</br>".$tudoJunto;
            /* 
            Explode() => {
              Definimos um ou mais caracteres e através desse caractere
              ele vai transformar uma string em um array();
            }

            Implode() => {
                inverso do Explode(), cria uma string através do array dado;
            }
            
            */
        ?>
    </body>
</html>