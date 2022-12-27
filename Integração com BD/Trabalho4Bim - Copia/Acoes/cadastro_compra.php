<body style='background:#121213; color:white'></body>

<?php
    //Trás os dados do arquivo connect.php sem ter que digitar tudo de novo;
    require_once 'connect.php';

    echo "
        <center>
    ";

    //Quando for disparado o formulário de cadastro de COMPRAS, será feito o que está dentro do IF I;
    if($_POST){

        //Caso a data de cadastro da compra seja maior ou igual a data do exato momento que está sendo realizada a compra, será feito o que está dentro do IF II;
        if(date('Y-m-d') < $data_cadastro = date($_POST['data_cadastro'])){

            //Verifica se o internauta escolheu pelo menos um produto, caso o mesmo tenha escolhido, será feito o que está dentro do IF III;
            if(@$_POST['produtos']){

                $cliente = $_POST['cliente'];
                $produtos_array = $_POST['produtos'];

                //Comando SQL para pegar o nome do cliente que está realizando a compra ; 
                $sql_nome = "SELECT nome_cliente from cliente where id_cliente = $cliente";
                $resultado_nome = $connect -> query($sql_nome);

                //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY;
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
                

                //Quando chegou os produtos escolhidos pelo internauta, vieram em forma de ARRAY com seus respectivos ID que consta no BD na entidade dos produtos;
                
                //A forma bruta do dado entregue pelo formulário($produtos_array) está sendo usado para fazer uma nova variável que será uma string, para isso ocorrer, utilizará como parâmetro o '.';
                $produtos_string = implode('.', $produtos_array);

                //A var criada acima será utilizada para fazer um novo ARRAY, para isso acontecer, terá como parâmetro o '.';
                $produtos_array = explode('.', $produtos_string);


                //Para cada produto selecionado pelo internauta, será pego os dados desse respectivo produto;
                //COUNT => Serve para contarmos a quantidade de instâncias em um ARRAY, em outras palavras, o tamanho do ARRAY;
                for($i = 0 ; $i < count($produtos_array) ; $i++){
                    $selecionar_produtos[$i] = "SELECT nome_produto, preco FROM produtos WHERE produto_id = '$produtos_array[$i]'";
                }

                //Para cada produto selecionado acima, será realizado uma comunicação entre o comando SQL usado para selecionar os produtos e o Banco de Dados,
                //sendo o resultado dessa comunicação armazenada na var $resultado_produtos;
                for($i = 0 ; $i < count($selecionar_produtos) ; $i ++){
                    $resultado_produtos = $connect -> query($selecionar_produtos[$i]);

                    //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY;
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
      
                }

                //Para cada produto comprado, será adicionado na entidade compra a data da compra, o ID do cliente e por último, o ID do produto comprado;
                for($i = 0 ; $i < count($produtos_array) ; $i++){
                    $NovaCompra = "INSERT INTO compra values('', '$data_cadastro', '$cliente', '$produtos_array[$i]')";

                    //Conexão para que será realizada a tarefa acima;
                    $connect -> query($NovaCompra);

                    //Vamos atualizar o estoque colocando menos um onde o ID do produto for igual ao do produto(s) comprado(s);
                    $atualizar_estoque = "UPDATE produtos set estoque = estoque - 1 WHERE produto_id= '$produtos_array[$i]'";
                    $connect -> query($atualizar_estoque);       
                }

            //Caso o internauta não tenha escolhido nenhum produto, será realizado o que está abaixo, ELSE III;    
            } else {
                echo "
                    <fieldset>
                        <h2>Ops! você não adicionou nenhum produto! </h2>

                        <a href = '../cadastro_compra.php'>
                            <button>
                                Voltar
                            </button>
                        </a>
                    </fieldset>
                ";
            }
        //Caso a data dada seja menor que a data da atual compra, será  realizado o ELSE II;
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

    //Caso ocorra um error inesperado, fará o ELSE I;
    } else {
       echo "Ocorreu algum erro desconhecido durante a conexão, peço que nos perdoe"; 
    }

    echo "
        <br >
       <a href='../index.php'>
           <button> 
               Home 
           </button>
       </a>
   ";
   echo "</center>";

   //Fecha a conexão, feito com o objetivo de não pesar a rede e deixá-la pesada;
   $connect -> close();
?>