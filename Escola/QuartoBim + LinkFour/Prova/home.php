<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prova do Quarto Bimestre</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            echo "
                <div class='content'>
                <fieldset>
            ";
        ?>
        NumCliente:
        <?php
            $idCliente = rand(1, 100000);
            echo $idCliente;
            echo " 
                <br>
                    <legend>Comprar</legend>
                    <form method='POST'>
                        <label for='cliente'>Nome do Cliente: </label>
                        <input type='text' id='cliente' name='cliente'/> <br>

                        <label for='litros'>Qtd em Litros: </label>
                        <input type='number' id='litros' name='litros'/> <br>

                        <label for='prod'>Combustível</label>
            ";

            $arr = array(
                'Gasolina' => 3.99,
                'Etanol' => 4.99,
                'Ônix' => 10,
                'Leite Moça' => 100
            );

            echo "<select id='prod' name='prod'>";

            foreach($arr as $key => $value){
                echo "
                    <option value=".$value.">".$key." - ".$value."</option>
                ";
            }

            echo "
                        <input type='submit' value='Calcular'/>
                    </form>
                </fieldset>
            ";

        ?>

        <?php

            $arrValores = array(
                3.99,
                4.99,
                10,
                100
            );

            $cliente = $_POST['cliente'] ? $_POST['cliente']: 'Desconhecido';
        
            $prod = $_POST['prod'];

            $prod = explode(',', $prod);
            $nomeProd;

            foreach($arr as $key => $value){
                foreach($prod as $chave => $valor){
                    if($value == $valor){
                         $nomeProd = $key;
                    }
                }
            }

            $litros = $_POST['litros'];
            $total = 0;
            $pontuacao = 0;
            
            foreach($prod as $key => $value){
                foreach($arrValores as $chave => $valor){
                    if($value == $valor){
                        $total = $valor * $litros;
                    }
                }
            }
            

            $pontuacao = round($total * 2);

            $nome_arquivo = "Cliente.txt";

            $fp = fopen($nome_arquivo, 'a+');

                fwrite($fp, "Id: ".$idCliente. "\n");
                fwrite($fp, "Nome: ".$cliente. "\n");
                fwrite($fp, "Combustível: ". $nomeProd. "\n");      
                fwrite($fp, "Total à pagar: R$".number_format($total, '2', '.', ','). "\n");
                fwrite($fp, "Pontuação: ".$pontuacao. "\n");
                fwrite($fp, '------------------------------');

            fclose($fp);

            echo "
                <fieldset>
                <legend>Dados</legend>
            ";

            echo "Id: ".$idCliente. "<br>";
            echo"Nome: ".$cliente. "<br>";
            echo "Combustível: ". $nomeProd. "<br>";
            echo "Total à pagar: R$".number_format($total, '2', '.', ','). "<br>";
            echo "Pontuação: ".$pontuacao. "<br>";

            // $arquivo = file($nome_arquivo);
            // foreach($arquivo as $key => $line){
            //     echo $line."<br>";
            // }
            
            echo "
                </fieldset>
                </div>
            ";

        ?>
    </body>
</html>