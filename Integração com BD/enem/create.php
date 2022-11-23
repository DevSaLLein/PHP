<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar Aluno</title>

        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
        >

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous">
        </script>

    </head>
    <body>

        <fieldset>
            <legend> Adicionar Aluno</legend>

            <form action="PHP_Action/create.php" method='POST' class= 'form-group'>
                <table cellspacing='0' cellpadding='0'>
                    <tr>
                        <th>
                            Nome
                        </th>

                        <td>
                            <input type='text' class= 'form-control' name='fname' placeholder='Nome'/>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Sobrenome
                        </th>
                        
                        <td>
                            <input type="text" class= 'form-control' name='lname' placeholder='Sobrenome'>
                        </td>
                    </tr>

                    <tr>
                        <th>Contato</th>

                        <td>
                            <input type="text" class= 'form-control' name='contato' placeholder= 'Contato'>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Idade
                        </th>

                        <td>
                            <input type="text" class='form-control' name='idade' placeholder='Idade'>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button type='submit' class= 'btn btn-alert'>  
                                Salvar Dados
                            </button>
                        </td>

                        <td>
                            <a href="index.php">
                                <button type='button' class='btn btn-info'>
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