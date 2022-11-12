<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>fgets</title>
    </head>
    <body>
       <?php
            $arr = array(
                'Selecione',
                'Mc Isaac',
                'Mc Beth',
                'Mc Marcondes'
            );
            echo "<form method='POST'>";
            echo "<select name='sec'>";

            foreach($arr as $key => $value){
                echo "
                    <option value=". $key ."> 
                        ". $value ."
                    </option>
                ";
            }
            echo "<select>";
            echo "<input type='submit' value='Procurar'/>";
            echo "</form>";
       ?> 

       <?php

            $chave = $_POST['sec'] ? $_POST['sec'] : 'nenhum inserido';

            $link = array(
                'mcisaac.txt',
                'mcbeth.txt',
                'mclevi.txt'
            );
            $pacote;

            if($chave == 1){
                $pacote = file_get_contents($link[0]);
            } else if( $chave == 2){
                $pacote = file_get_contents($link[1]);
            } else if( $chave == 3){
                $pacote = file_get_contents($link[2]);
            }
            

            print_r(" link =>  " . $pacote );
            
            print_r( " <br>chave => " . $chave);

       ?>
    </body>
</html>