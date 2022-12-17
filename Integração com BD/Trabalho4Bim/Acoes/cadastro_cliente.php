<body style='background:#121213; color:white'></body>

<?php
    require_once 'connect.php';

    if($_POST){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $end = $_POST['end'];
        $cpf = $_POST['cpf'];

        $sql = "INSERT INTO cliente VALUES('', '$nome', '$sobrenome', '$end', '$cpf')";

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
        $connect -> close();
    }
?>