<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        <?php
            // Trás os dados do arquivo connect.php sem ter que digitar tudo de novo;   
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
                       Clientes com igual ou mais de uma compra!
                    </legend>
            ";

            //Vai agrupar todos os produtos comprados por seus respectivos compradores;  
            $Agrupamento = 
               'SELECT cliente.id_cliente, cliente.nome_cliente, cliente.sobrenome, produto.nome_produto, produto.preco, compra.data_compra,
                COUNT(compra.compra_id) AS total
                FROM cliente as cliente, produtos as produto, compra as compra 
                WHERE compra.id_cliente = cliente.id_cliente AND compra.produto_id = produto.produto_id
                GROUP BY(cliente.id_cliente)
   
            ';


            //Vai fazer uma conexão com o Banco de dados dando o comando sql escrito na variável $agrupamento, após isso, o seu resultado
            //será aguardado na variável $resultado_agrupamento;
            //query() => Ler um comando SQL;
            $resultado_agrupamento = $connect -> query($Agrupamento);

            //Caso o resultado da pesquisa anterior der mais de ZERO linhas, será executado o que está dentro do IF;
            if( $resultado_agrupamento -> num_rows > 0 ){
                echo "
                    <table border='1' align='center'>
                        <thead align='center' style='background:white; color:black;'>
                            <tr>
                                <th>
                                    Cliente
                                </th>
            
                                <th>
                                   Quantidade de produtos comprados
                                </th>
                            </tr>
                        </thead>
                        <tbody align='center'>
                ";
                    //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY;  
                    while($row = $resultado_agrupamento -> fetch_assoc()){

                        //Data pegue do Banco de Dados e armazenada dentro do objeto $data;
                        $data = new DateTime($row['data_compra']);

                        echo "                    
                            <tr>
                                <td>
                                    ".$row['nome_cliente']." ".$row['sobrenome']."
                                </td>

                                <td> 
                                    ".$row['total']."
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

                // Vai pegar uma relação com todos os clientes presentes na aplicação;
                $clientes_atuais = 'SELECT nome_cliente, sobrenome FROM cliente';

                // A var $resultado_clientes vai receber o resultado feito através da conexão do BD com o comando mysql;
                $resultado_clientes = $connect -> query($clientes_atuais);

                //Caso o resultado feito do comando SQL der mais de ZERO linhas, será executado o que estiver dentre o IF
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

                
            }
            
        ?>
    </body>
</html>