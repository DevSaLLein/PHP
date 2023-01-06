<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compras totais</title>
    </head>
    <body>
        <?php
            //Trás os dados do arquivo connect.php sem ter que digitar tudo de novo;
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
            //@ => Ignorar erros;
            //a var $CPF vai receber o que está no input chamado cpf dado ao form anterior;
            @$CPF = $_POST['cpf'];        

            //comando SQL que vai pegar os dados do cliente que possui o CPF que vai ser indicado mais pra frente;
            $nome = "SELECT nome_cliente, sobrenome from cliente where cpf='$CPF'";
            $resultado_nome = $connect -> query($nome);
            
            //Trás uma relação completa de todos os produtos comprados pelo cliente indicado pelo CPF; 
            $compras = 
               "SELECT produto.nome_produto, produto.preco, compra.data_compra
                FROM cliente as cliente, produtos as produto, compra as compra
                WHERE compra.id_cliente = cliente.id_cliente AND compra.produto_id = produto.produto_id AND cliente.CPF='$CPF'
                ORDER BY compra.compra_id DESC
            ";

            //Resultados dos comandos SQL escritos logo acima;
            $resultado_nome = $connect -> query($nome);
            $resultado_compras = $connect -> query($compras);
            //Enquanto o usuário não digita o CPF, irá aparecer a msg abaixo;
            if(!$CPF){
                echo "
                    <h1>
                        digite seu CPF
                    </h1>"
                ;
            }
            //Caso o CPF exista(TRUE) fará o que está no IF I
            elseif($resultado_nome -> num_rows > 0){
                //Caso o resultado de linhas do comando SQL das compras der mais de ZERO, fará o que está no IF II
                if($resultado_compras -> num_rows > 0 ){
                    //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY; 
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

                    //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY; 
                    while($row = $resultado_compras -> fetch_assoc()){

                        //Data pegue do Banco de Dados e armazenada dentro do objeto $data;
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
                    
                //SEGUNDA CONDIÇÂO, caso o resultado de linhas for menor que 1(ZERO), fará o que está dentro do ELSEIF;
                } elseif($resultado_compras -> num_rows <= 0 ){

                    

                    //A var $row vai receber um agrupamento feito através de um array associativo em que cada coluna do banco de dado é uma parte do ARRAY; 
                    while($row = $resultado_nome -> fetch_assoc()){
                        echo "
                            <h2>
                                Olá! ".$row['nome_cliente']." ".$row['sobrenome'].", vejo que você ainda não fez nenhuma compra
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
                //Caso o CPF nao existir(FALSE), será executado o que está no else abaixo;
                } 

            } elseif($resultado_nome -> num_rows <= 0) {

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