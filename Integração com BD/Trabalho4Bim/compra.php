<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compras totais</title>
    </head>
    <body>
        <?php
            require_once 'Acoes/connect.php';

            echo "<center>";
            echo "
                <form method='POST'>
                    <label for='cpf'> Digite seu CPF</label>
                    <input type='text' name='cpf' placeholder='Digite seu CPF' id='cpf'/>

                    <input type='submit' value='enviar'/>
                </form>
            ";

        ?>

        <?php

            @$CPF = $_POST['cpf'];        

            $nome = 
               "SELECT cliente.id_cliente, cliente.nome_cliente, cliente.sobrenome, produto.nome_produto, produto.preco, compra.data_compra
                FROM cliente as cliente, produtos as produto, compra as compra
                WHERE compra.id_cliente = cliente.id_cliente AND compra.produto_id = produto.produto_id AND cliente.CPF='$CPF'
                GROUP BY cliente.id_cliente
            ";

            $compras = 
               "SELECT cliente.id_cliente, cliente.nome_cliente, cliente.sobrenome, produto.nome_produto, produto.preco, compra.data_compra
                FROM cliente as cliente, produtos as produto, compra as compra
                WHERE compra.id_cliente = cliente.id_cliente AND compra.produto_id = produto.produto_id AND cliente.CPF='$CPF'
                ORDER BY compra.data_compra ASC
            ";

            $resultado_nome = $connect -> query($nome);
            $resultado_compras = $connect -> query($compras);


            if($CPF){
                if($resultado_compras -> num_rows > 0 ){
                    while($row = $resultado_nome -> fetch_assoc()){
                        echo "
                            <h2>
                                Olá, ".$row['nome_cliente']." ".$row['sobrenome']."!
                            </h2>
                            <h4>
                                <i>
                                    Olhe suas devidas compras logo abaixo
                                </i>
                            </h4>
                        ";
                    }
            
                    echo "<table border='1'>";
                    
                    echo "
                        <thead align='center'>
                            <tr>
                                <th>
                                    Nome do Produto
                                </th>
                        
                                <th>
                                    Preço do Produto
                                </th>
                        
                                <th>
                                    Data da compra
                                </th>
                            </tr>
                        </thead>
                        <tbody align='center'>
                    ";

                    while($row = $resultado_compras -> fetch_assoc()){
                        $data = new DateTime($row['data_compra']);
                        echo "
                            <tr>
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
                    echo "
                            <tbody>
                        </table>
                    ";
                } elseif($resultado_compras -> num_rows <= 0 ){
                    while($row = $resultado_nome -> fetch_assoc()){}
                        echo "
                            <h2>
                                Olá! Vejo que você ainda não fez nenhuma compra
                                <br> 
                                Para fazer uma nova compra, <a href='cadastro_compra.php'> clique aqui </a>
                            </h2>
                        ";
                        echo "
                            <table border='1'>
                                <tr>
                                    <td>
                                        <center>
                                            Sem produtos comprados
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        ";
    
                    
                }

            } else {
                echo "
                    <fieldset>
                        <h2>
                            Olá, nos desculpe, não  o encontramos como nosso cliente atual 
                            <br> 
                            veja se não ocorreu nenhum erro na digitação de seu CPF 
                            <br>
                            caso nao seja um cliente, <a href='cadastro_cliente.php'>clique aqui</a>
                        </h2>
                    </fieldset>
                ";

            }
            echo "
                <br>
                <a href='index.php'>
                    <button>
                        Voltar
                    </button>
                </a>
            ";
            echo "<center>";
        ?>
    </body>
</html>