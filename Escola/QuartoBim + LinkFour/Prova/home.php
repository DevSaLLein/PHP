<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prova do Quarto Bimestre</title>
    </head>
    <body>
        <?php
            echo "
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
                'Ônix' => 10
            );

            echo "<select id='prod' name='prod'>";

            foreach($arr as $key => $value){
                echo "
                    <option value=".$value.">".$key."-".$value."</option>
                ";
            }

            echo "
                    <input type='submit' value='Calcular'/>
                </form>
            ";

        ?>

        <?php
            // $arrValores = array();
            // foreach($arr as $key => $values){
            //     foreach($arrValores as $chave => $valores){
            //         $arrValores[] = $values;
            //     }
            // }

            // print_r($arrValores);
            

            $idCliente = rand(1, 100000);
            $cliente = $_POST['cliente'] ? $_POST['cliente']: 'Desconhecido';
        
            $prod = $_POST['prod'];

            // $prod = explode(',', $prod);
            // $nomeProd;
            // foreach($arr as $key => $value){
            //     foreach($prod as $chave => $valor){
            //         if($value == $valor){
            //              $nomeProd = $key;
            //         }
            //     }
            // }

            $litros = $_POST['litros'];
            $total = 0;
            $pontuacao = 0;
            
            $total = $prod * $litros;
            

            $pontuacao = round($total * 2);

            $nome_arquivo = "Cliente.txt";

            $fp = fopen($nome_arquivo, 'w+');

                fwrite($fp, "Nome: ".$cliente. "\n");
                fwrite($fp, "Combustível: ". $prod. "\n");      
                fwrite($fp, "Total à pagar: ".$total. "\n");
                fwrite($fp, "Pontuação: ".$pontuacao. "\n");

            fclose($fp);

        ?>
    </body>
</html>