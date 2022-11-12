<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CUPOM</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body style='background:#121214;'>
        <?php
            $rand = rand(1000,9999);
            echo $rand;
            echo "
                <form method='POST' action='home.php'>
            ";

            echo "
                <label for='name'>Nome:</label>
                <input type='text' name='name' id='name'/> <br>

                <label for='dt'>Data de Nascimento</label>
                <input type='date' name='dt' id='dt'/> <br <hr>

                <h2>Produtos</h2>
            ";

            $Produtos = array(
                'Tv Samsung 33"' => 1500,
                'Ventilador' => 100,
                'Liquidificador' => 90,
                'Cafeteira' => 150 
            );

            foreach($Produtos as $key => $value)
                echo "
                    <input type='checkbox' id=".$key." name='prod[]' value='".$value."'/>
                    <label for=".$key.">".$key."</label> <br>
                ";

            echo "
                <input type='submit' value='Comprar'/>
                </form>
            ";
        ?>    

        <?php
            #Variáveis
            $nome = $_POST['name'];
            $data = date('d/m/Y', strtotime($_POST['dt']));
            $prod = $_POST['prod'];
            $pasta = 'Cupons';
            $nome_arquivo = 'Compradores.txt';
            $soma = 0;
             
            #Somando os valores dos produtos 
            foreach($prod as $key => $value){
                $soma += $value;
            }

            if($soma > 150 && $soma < 800){
                $desconto = ($soma * 0.05);
                $soma -= $desconto;

            }else if( $soma > 800){
                $desconto = ($soma * 0.10);
                $soma -= $desconto;
            }

            #criando uma pasta 
            if(!is_dir($pasta)){
                mkdir($pasta);
            }
 
            #abrindo o arquivo e fechando o arquivo
            $fp = fopen($nome_arquivo, 'w+');
            
                fwrite($fp, $rand. "\n");
                fwrite($fp, $nome. "\n");
                fwrite($fp, number_format($soma, '2', ',', '.'). "\n");

                foreach($Produtos as $key => $value){
                    foreach($prod as $key1 => $valor){
                        if($value == $valor){
                            fwrite($fp, $key. "\n");
                        }
                    }
                }
            fclose($fp);
            rename("$nome_arquivo", "$pasta/$nome_arquivo");

        ?>
    </body>
</html>