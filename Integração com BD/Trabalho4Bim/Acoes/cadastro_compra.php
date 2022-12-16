<body style='background:#121213; color:white'></body>

<?php

    require_once 'connect.php';
    if($_POST){
        if($dataAtual= date('Y/m/d') < $data_cadastro= $_POST['data_cadastro']){
            if($_POST['produtos']){

                $cliente = $_POST['cliente'];
                $produtos_array = $_POST['produtos'];

                $sql_nome = "SELECT nome_cliente from cliente where id_cliente = $cliente";
                $resultado_nome = $connect -> query($sql_nome);

                while($row = $resultado_nome -> fetch_assoc()){
                    echo "
                        <h3>
                            Olá! ".$row['nome_cliente'].", sua compra foi feita com sucesso! <br>
                        </h3>
                    ";
                }

                echo "
                    <h4>
                        Confira suas devidas compras abaixo:
                    </h4>

                    <table border='1'>
                    <tr>
                        <th>
                            Nome do produto
                        </th>

                        <th>
                            Preço
                        </th>
                    </tr>
                ";
                
                $produtos_string = implode('.', $produtos_array);
                $produtos_array = explode('.', $produtos_string);

                for($i = 0 ; $i < count($produtos_array) ; $i++){
                    $selecionar_produtos[$i] = "SELECT nome_produto, preco FROM produtos WHERE produto_id = '$produtos_array[$i]'";
                }

                for($i = 0 ; $i < count($selecionar_produtos) ; $i ++){
                    $resultado_produtos = $connect -> query($selecionar_produtos[$i]);

                    if($resultado_produtos -> num_rows > 0 ) {
                        while($row = $resultado_produtos -> fetch_assoc()){
                            echo "
                                <tr>
                                        <td>
                                            ".$row['nome_produto']."
                                        </td>

                                        <td>
                                            R$ ".$row['preco']."
                                        </td>
                                </tr>                        
                            ";       
                        }

                    } else {
                        echo "ERROR";
                    }      
                }

                for($i = 0 ; $i < count($produtos_array) ; $i++){
                    $NovaCompra = "INSERT INTO compra values('', '$data_cadastro', '$cliente', '$produtos_array[$i]')";
                    $connect -> query($NovaCompra);

                    $atualizar_estoque = "UPDATE produtos set estoque = estoque - 1 WHERE produto_id= '$produtos_array[$i]'";
                    $connect -> query($atualizar_estoque);       
                }
                
            } else {
                echo "
                    <h2>Ops! você não adicionou nenhum produto! </h2>

                    <a href = '../cadastro_compra.php'>
                        <button>
                            Voltar
                        </button>
                    </a>
                ";
            }
        } else {
            echo "
                <h2> 
                    Por favor, Insira uma data aceitável, agradecemos desde já a sua colaboração :D 
                </h2>
                <a href = '../cadastro_compra.php'>
                    <button>
                        Voltar
                    </button>
                </a>
            ";       
        }

        echo "</table>";

    } else {
       echo "Ocorreu algum erro desconhecido durante a conexão, peço que nos perdoe"; 
    }

    echo "
       <a href='../index.php'>
           <button> 
               Home 
           </button>
       </a>
   ";

?>