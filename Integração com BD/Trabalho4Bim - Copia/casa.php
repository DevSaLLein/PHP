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

            if($_POST){
                if($_POST['usuario'] || $_POST['password']){
                    
                    $usuario = $_POST['usuario'];
                    $password = $_POST['password'];

                    $verificacao = "SELECT nome_cliente, sobrenome FROM cliente WHERE CPF='$usuario' ";
                    $verificacao = $connect -> query($verificacao);
                    
                    $total = 
                        "SELECT cliente.id_cliente, cliente.nome_cliente, cliente.sobrenome, produto.nome_produto, produto.preco, compra.data_compra,
                        COUNT(compra.compra_id) AS total
                        FROM cliente as cliente, produtos as produto, compra as compra 
                        WHERE compra.id_cliente = cliente.id_cliente AND compra.produto_id = produto.produto_id AND CPF='$usuario'
                        GROUP BY(cliente.id_cliente)
                    ";
                    $total = $connect -> query($total);
                    
                    if($verificacao -> num_rows > 0){

                        // Trás os dados do arquivo connect.php sem ter que digitar tudo de novo;   

                        while($row = $verificacao -> fetch_assoc()){
                            echo "
                                <center>
                                    <h1> Bem-vindo(a) à Tech_Point, ".$row['nome_cliente']." ".$row['sobrenome']. "</h1>
                                    
                                    <p>
                                        <i>
                                            Tudo de tecnologia em um único lugar!
                                        </i>
                                    </p>
                               

                                    <a href='https://github.com/DevSaLLein'>
                                        <img src='Estilo/github.png'/ width='100px' height='100px' align='center' target='_blank'>
                                    </a>

                            ";
                        }
                        if($total -> num_rows > 0){
                            while($row = $total -> fetch_assoc()){
                                echo "
                                    <p>
                                        Seu total de compras até agora foi de: ".$row['total']."
                                    </p>
                                ";
                            }
                        } else {
                            echo "
                                <p>
                                    Seu total de compras até agora foi de: 0
                                </p>
                            ";  
                        }
                            
                            echo "</fieldset>";

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

                    } else {
                        echo "
                            <h2> 
                                Não o encontramos como um cliente atual, verifique novamente
                            </h2>

                            <a href='index.php'>
                                <button>
                                        voltar
                                </button>
                            </a>
                        ";
                    }
                } else {
                    echo "
                        <h1>
                            Você esqueceu algum dado :(
                        </h1>

                        <a href='index.php'>
                            <button>
                                    voltar
                            </button>
                        </a>
                    ";
                }
            }
            
        ?>
    </body>
</html>