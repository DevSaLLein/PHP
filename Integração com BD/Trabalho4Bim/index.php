<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        <?php

            require_once 'Acoes/connect.php';

            echo "
                <center>
                    <h1> Bem-vindo(a) à Tech_Point! </h1>

                    <a href='https://github.com/DevSaLLein'>
                        <img src='Estilo/github.png'/ width='100px' height='100px' align='center' target='_blank'>
                    </a>

                    <p>
                        <i>
                            Tudo de tecnologia em um único lugar!
                        </i>
                    </p>
            ";
            echo "
                <fieldset>
                    <legend align='center'>
                        Últimas Compras realizadas!
                    </legend>
            ";

            $Agrupamento = 
               'SELECT cliente.id_cliente, cliente.nome_cliente, cliente.sobrenome, produto.nome_produto, produto.preco, compra.data_compra 
                FROM cliente as cliente, produtos as produto, compra as compra 
                WHERE compra.id_cliente = cliente.id_cliente AND compra.produto_id = produto.produto_id 
                GROUP BY compra.compra_id DESC
                HAVING COUNT(compra.compra_id) >= 1   
            ';
             
            $resultado_agrupamento = $connect -> query($Agrupamento);

            if( $resultado_agrupamento -> num_rows > 0 ){
                echo "
                    <table border='1' align='center'>
                        <thead align='center' style='background:white; color:black;'>
                            <tr>
                                <th>
                                    Cliente
                                </th>
            
                                <th rowspan='10'>
                                    Produto Comprado
                                </th>
            
                                <th>
                                    Preço
                                </th>
            
                                <th>
                                    Data da Compra
                                </th>
                            </tr>
                        </thead>
                        <tbody align='center'>
                ";
                    while($row = $resultado_agrupamento -> fetch_assoc()){
                        $data = new DateTime($row['data_compra']);

                        echo "                    
                            <tr>
                                <td>
                                    ".$row['nome_cliente']." ".$row['sobrenome']."
                                </td>

                                <td> 
                                    ".$row['nome_produto']."
                                </td>
                                
                                <td>
                                    R$ ".$row['preco']."
                                </td>

                                <td>
                                    ".$data -> format('d/m/Y')."
                                </td>
                            </tr>
                        ";
                    }

                echo "</tbody>";
                echo "</table>";
                echo "</fieldset>";

                echo "
                    <br>

                    <a href='cadastro_cliente.php'>
                        <button>Seja um cliente!</button>
                    </a>
                ";
        
                echo "
                    <a href='cadastro_compra.php'>
                        <button> 
                            Faça uma nova compra! 
                        </button>
                    </a>
                ";

                echo "
                <a href='compra.php'>
                    <button>  Veja todas as suas compras </button>
                </a>
                ";

                
                echo "
                    <h2>
                        Clientes atuais
                    </h2>
                ";

                echo "<table border='1' align='center'>";

                $clientes_atuais = 'SELECT nome_cliente, sobrenome FROM cliente';
                $resultado_clientes = $connect -> query($clientes_atuais);

                if($resultado_clientes -> num_rows > 0) {
                    while($row = $resultado_clientes -> fetch_assoc()){
                        echo "
                            <tr>
                                <td>
                                    ".$row['nome_cliente'].' '.$row['sobrenome']."
                                </td>
                            </tr>
                        ";
                    }
                } else {
                    echo "
                        <tr>
                            <td>
                                Sem clientes :/
                            </td>
                        </tr>
                    ";

                    echo "</center>";
                }
            } else {
                echo "
                    <table border='1'>
                        <tr>
                            <td>
                                SEM DADOS A APRESENTAR!
                            </td>
                        </tr>
                    </table>
                ";
            }
            
        ?>
    </body>
</html>