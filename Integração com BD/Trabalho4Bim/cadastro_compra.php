<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro compra</title>
    </head>
    <body style='background-image:url(Estilo/cadastro_compra.png)'>
        <?php

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

            $sql_clientes = "SELECT id_cliente, nome_cliente, sobrenome FROM cliente";
            $sql_produtos = 'SELECT * FROM produtos WHERE estoque >= 1';

            echo "
                <div align='center'>
                    <label for='cliente'> 
                        Cliente: 
                    </label>
                    
                    <select name='cliente' id='cliente'>
                </div> 
            ";

            $clientes = $connect -> query($sql_clientes);

            while($row = $clientes -> fetch_assoc()){
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
            $resultado = $connect -> query($sql_produtos);
            if($resultado -> num_rows > 0){
                while($row = $resultado -> fetch_assoc()){
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