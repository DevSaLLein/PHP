<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <body>
        <?php
            require_once 'db_connect.php';

            if($_POST){
                $nome = $_POST['fname'];
                $sobrenome = $_POST['lname'];
                $contato = $_POST['contato'];
                $idade = $_POST['idade'];

            }

            $sql = "INSERT INTO alunos( nome, sobrenome, contato, idade, ativo) VALUES
                ('$nome', '$sobrenome', '$contato', '$idade', 0)
            ";

            if($connect -> query($sql) === TRUE){
                echo '<p> Novo aluno cadastrado com sucesso </p>';
                echo "
                    <a href='../create.php'> 
                        <button type='button'> VOLTAR </button>
                    </a>
                ";

                echo "
                    <a href='../index.php'>
                        <button type='button'> HOME </button>
                    </a>
                ";
           
            } else {
                echo "ERRO". $sql. " ". $connect -> connect_error; 
            }
            $connect -> close();
        ?>  
    </body>
</html>