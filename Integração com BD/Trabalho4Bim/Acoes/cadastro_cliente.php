<body style='background:#121213; color:white'></body>

<?php
    //Trás os dados do arquivo connect.php sem ter que digitar tudo de novo;
    require_once 'connect.php';

    //Caso seja disparado o POST dado através do formulário de cadastro dos CLIENTES, será feito o que está no IF I;
    if($_POST){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $end = $_POST['end'];
        $cpf = $_POST['cpf'];

        //Comando SQL para se inserir os dados dados pelo internauta no Banco de Dados;
        $sql = "INSERT INTO cliente VALUES('', '$nome', '$sobrenome', '$end', '$cpf')";

        //Se a conexão entre o Banco de Dados e o comando SQL der tudo certo(TRUE), será executado o que está no IF II; 
        if($connect -> query($sql) === TRUE){
            echo "
                <fieldset>
                    <center>
                        <h2>
                            Novo cliente cadastrado com sucesso!
                        </h2>
                        
                        <img src='../Estilo/cadastro_cliente.png' width='250px' height='250px'/>

                        <a href='../index.php'>
                            <button>Home</button>
                        </a>

                        <a href='../cadastro_cliente.php'>
                            <button>Voltar</button>
                        </a>
                    </center>
                </fieldset>
            ";
        }

        //Fecha a conexão, feito com o objetivo de não pesar a rede e deixá-la pesada;
        $connect -> close();
    }
?>