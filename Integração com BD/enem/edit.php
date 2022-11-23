<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>edit</title>

        <style type='text/css'>
            fieldset{
                width: 50%;
                margin: auto;
                margin-top:100px;
            }

            table tr th{
                margin-top: 20px
            }

        </style>
    </head>
    <body>
        <?php
            require_once 'PHP_Action/db_connect.php';

            if($_GET['id']){
                $id = $_GET['id'];

                $sql = "SELECT * FROM alunos WHERE id= {$id}";
                $result = $connect -> query($sql);
                $data = $result -> fetch_assoc();
                $connect -> close();
            }

        ?>  

        <fieldset>
            <legend> Edição de Alunos </legend>

            <form action="PHP_Action/update.php" method='post'>
                <table cellspacing='0' cellpadding='0'>
                    <tr>
                        <th>
                            Nome
                        </th>
                        
                        <td> 
                            <input type="text" name='nome' placeholder= 'Nome' class= 'form-control' value=
                                "<?php echo $data['nome']?>"
                            >
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sobrenome
                        </th>

                        <td>
                            <input type="text" name='sobrenome' placeholder='Sobrenome' class= 'form-control' value=
                                "<?php echo $data['sobrenome']?>"
                            >
                        </td>
                    </tr>    
                    <tr>
                        <th>
                            Contato
                        </th>

                        <td>
                            <input type="text" name="contato" placeholder="Contato" class= 'form-control' value=
                                "<?php echo $data['contato']?>"
                            >
                        </td>
                    </tr>        
                    <tr>
                        <th>
                             Idade 
                        </th>

                        <td>
                            <input type="text" name="idade" placeholder="Idade" class= 'form-control' value=
                                "<?php echo $data['idade']?>"
                            >
                        </td>

                    </tr>
                    <tr>
                        <input type='hidden' name='id' value="<?php echo $data['id']?>"/>

                        <td>
                            <a href="index.php">
                                <button type='submit'>
                                    Salvar Alterações
                                </button>
                            </a>
                        </td>

                        <td>
                            <a href="index.php">
                                <button type='button'>
                                    Voltar
                                </button>
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
</body>
</html>