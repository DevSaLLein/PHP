<body style='background:#121213; color:white'></body>

<?php
    require_once 'connect.php';

    if($_POST){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $end = $_POST['end'];

        $sql = "INSERT INTO cliente VALUES('', '$nome', '$sobrenome', '$end')";

        if($connect -> query($sql) === TRUE){
            echo "
                <h3>
                    Novo cliente cadastrado com sucesso!
                </h3>

                <a href='../index.php'>
                    <button>Home</button>
                </a>

                <a href='../cadastro_cliente.php'>
                    <button>Voltar</button>
                </a>
            ";
        }
    }
?>