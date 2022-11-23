<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Remover Aluno</title>
    </head>
    <body>
        <h3>
            Você realmente deseja remover?
        </h3>
        
        <form action="PHP_Action/remove.php">
            <input type="hidden" name="id" value="<?php echo $data['id']?>">

            <button type='submit'>
                Confirmar
            </button>
            
            <a href="index.php">
                <button type='button'>
                        Voltar
                </button>
            </a>
        </form>
        <?php
            require_once 'PHP_Action/db_connect.php';

            if($_GET['id']){
                $id = $_GET['id'];

                $sql = "SELECT * FROM alunos WHERE id = {$id}";
                $result = $connect -> query($sql);
                $data = $result -> fetch_assoc();

                $connect -> close();
            }
        ?>
    </body>
</html>