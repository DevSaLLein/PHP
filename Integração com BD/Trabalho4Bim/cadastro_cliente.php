<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro cliente</title>
</head>
<body class='body'>
    <?php
        require_once 'Acoes/connect.php';
        echo "
            <fieldset>
                <center>
                    <h2>
                        Cadastro
                    </h2>
                    
                    <form method='POST' action='Acoes/cadastro_cliente.php'>
                        <label for='nome'>Seu nome: </label>
                        <input type='text' placeholder='Digite seu nome' id='nome' name='nome'/>

                        <br>

                        <label for='sobrenome'>Seu sobrenome: </label>
                        <input type='text' placeholder='Digite seu sobrenome' id='sobrenome' name='sobrenome'/>

                        <br>

                        <label for='end'>Seu endereço: </label>
                        <input type='text' placeholder='Digite seu endereço' id='end' name='end'/>
                    
                        <br>
                        <br>
                        <input type='submit' value='Cadastrar'/>
                    </form>
                        <a href='index.php'>
                            <button>
                                Home
                            </button>
                        </a>
                </center>
            </fielset>
        ";
    ?>
</body>
</html>