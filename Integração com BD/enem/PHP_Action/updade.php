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
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $contato = $_POST['contato'];
                $idade = $_POST['idade'];
                
                $id = $_POST['id'];

                $sql = 
                    "UPDATE alunos SET nome = '$nome',
                    sobrenome = '$sobrenome',
                    contato = '$contato',
                    idade = '$idade',
                    ativo = 1 WHERE id = '$id'
                ";

                if($connect -> query($sql) === TRUE){
                    
                    echo "
                        <p> Atualização realizada com sucesso! </p>
                    ";

                    echo "
                        <a href='../edit.php?id=".$id."'>
                            <button type='button'>
                                Editar
                            </button>
                        </a>
                    ";
                    

                echo "
                        <a href='../index.php'>
                            <button type='button'>
                                Voltar
                            </button>
                        </a>
                    ";
                    
                } else {
                    echo "ERRO ao atualizar os dados do aluno". $connect -> error;
                }

                $connect -> close(); 
            }
        ?>
    </body>
</html>