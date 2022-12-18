<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar compra</title>
    </head>
    <body style='background-image:url(Estilo/cadastro_compra.png)'>
        <?php
            //Trás os dados do arquivo connect.php sem ter que digitar tudo de novo;
            require_once 'Acoes/connect.php';
            echo "
                <fieldset style='background:#121213; opacity:50%'>
                    <div>
                        <h2 align='center'>
                            Produtos disponíveis
                        </h2>
                        <hr>
                    </div>
                        <form method='POST' action='Acoes/cadastro_compra.php'>
                            <table border='1' align='center'>
                                <thead align ='center' style='color:black; background:white'>
                                    <tr>

                                        <th>
                                            Nome 
                                        </th>

                                        <th>
                                            Preço
                                        </th>

                                        <th>
                                            Estoque
                                        </th>
                                    </tr>
                                </thead>
            ";

            //Comando SQL para pegar os dados dos clientes
            $sql_clientes = "SELECT id_cliente, nome_cliente, sobrenome FROM cliente";
            //Comando SQL para pegar os dados dos produtos que tenham 1 ou mais de estoque
            $sql_produtos = 'SELECT * FROM produtos WHERE estoque >= 1';

            echo "
                <div align='center'>
                    <label for='cliente'> 
                        Cliente: 
                    </label>
                    
                    <select name='cliente' id='cliente'>
                </div> 
            ";

            //A var resultado_clientes vai receber os dados dados através da conexão realizada entre o BD e o comando SQL dos clientes;  
            $resultado_clientes = $connect -> query($sql_clientes);

            //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY; 
            while($row = $resultado_clientes -> fetch_assoc()){
                echo "
                    <option value=".$row['id_cliente'].">
                        ".$row['nome_cliente']."
                    </option>
                ";
            }

            echo "
                </select>
            ";

            echo "
                <br>

                <label for='data'> 
                    Data atual: 
                </label>

                <input type='date' id='data' name='data_cadastro'/>
            ";

            echo "<tbody>";

            //A var resultado_produtos vai receber os dados dados através da conexão realizada entre o BD e o comando SQL dos produtos;
            $resultado_produtos = $connect -> query($sql_produtos);

            //Caso o resultado dado der mais de ZERO linhas, será executado o que está no IF
            if($resultado_produtos -> num_rows > 0){

                //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY;
                while($row = $resultado_produtos -> fetch_assoc()){
                    echo "
                        <tr>
                            <td>
                
                                <input type='checkbox' name='produtos[]' value=".$row['produto_id']."/>
                                <center>" .$row['nome_produto']. "</center>
                            </td>

                            <td>
                                <center>R$ ".$row['preco']. "</center>
                            </td>

                            <td>
                                <center>" .$row['estoque']." </center>
                            </td>
                        </tr>
                    ";
                }


                echo "</tbody>";
                echo "
                    </table>
                    <center>
                        <input type='submit' value='Cadastrar compra'/>
                        </form>
                        
                        <a href='index.php'>
                            <button>
                                Voltar
                            </button>
                        </a>
                        
                        <br>
                        
                        <a href = cadastro_cliente.php>
                            Não é cliente? clique aqui!
                        </a>
                    </center>
                    </fieldset>
                ";
            } 
        ?>
    </body>
</html>