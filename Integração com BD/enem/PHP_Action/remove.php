<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Remove</title>
    </head>

    <body>
        <?php
            require_once 'db_connect.php';

            if($_POST){

                $id = $_POST['id'];
                $sql = 
                    "UPDATE alunos SET ativo = 0 WHERE id = {$id} 
                ";

                if($connect -> query($sql) === TRUE){
                    
                    echo "<p>Aluno removido com sucesso!</p>";
                    echo "
                        <a href='../index.php'>
                            <button type='button'>
                                Voltar
                            </button>
                        </a>
                    ";
                } else {
                    echo "Erro ao excluir o registro: ". $connect -> error;
                }
                $connect -> close();
            }
        ?>
    </body>
</html>