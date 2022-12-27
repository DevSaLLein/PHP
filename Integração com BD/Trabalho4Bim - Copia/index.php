<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
     require_once 'Acoes/connect.php';
        echo "
            <center>
                    <fieldset>
                        <form method='POST' action='casa.php'>

                            <h1>
                                Login
                            </h1>

                            <label for='usuario'> Usuário: </label>
                            <input type='text' id='usuario' name='usuario' placeholder='Digite seu nome'/>

                            <br>

                            <label for='password'> Senha: </label>
                            <input type='password' id='password' name='password' placeholder='Digite sua senha'/><br> <br>
                        
                            <input type='submit' value='Entrar'/>
                        </form>

                        <br>

                        <a href='cadastro_cliente.php'>
                            <button>Seja um novo cliente!</button>
                        </a>
                    </fieldset>
            </center>
        ";
    ?>
</body>
</html>