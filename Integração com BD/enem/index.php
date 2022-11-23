<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
        >

    </head>
    <body>
        <?php
            require_once 'PHP_Action/db_connect.php';
        ?>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous">
            defer
        </script>

        <div id= "tabelaAluno">
            <a href= "create.php">
                <button class="btn btn-success">
                    Inscrever Aluno
                </button>
            </a>

            <table class= "table table-bordered">

                <thead>

                    <tr>
                        <th>
                            Nome
                        </th>

                        <th>
                            Sobrenome
                        </th>

                        <th>
                            Contato
                        </th>

                        <th>
                            Idade
                        </th>
                    </tr>

                    </thead>

                    <tbody>
                        <?php
                            $sql = 
                                "SELECT * FROM alunos WHERE ativo = 0
                            ";

                            $result = $connect -> query($sql);

                            if($result -> num_rows > 0){
                                while($row = $result -> fetch_assoc()){
                                    echo "
                                        <tr>
                                            <td>".$row['nome']."</td>
                                            <td>".$row['sobrenome']."</td>
                                            <td>".$row['contato']."</td>
                                            <td>".$row['idade']."</td>
                                            <td>

                                                <a href='edit.php?id=".$row['id']."'>
                                                    <button type='button' class='btn btn-primary'> Editar </button>
                                                </a>

                                                <a href='remove.php?id=".$row['id']."'>
                                                    <button type='button' class='btn btn-danger'> Excluir </button>
                                                </a> 
                                                
                                            </td>
                                        </tr>
                                    ";
                                } 
                            }else {
                                echo "
                                    <tr>
                                        <td colspan='5'>
                                            <center>
                                                Sem Dados a apresentar
                                            </center>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
            </table>
        </div>
    </body>
</html>