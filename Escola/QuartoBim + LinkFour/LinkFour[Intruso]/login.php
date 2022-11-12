<!DOCTYPE html>


<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="css/style-1.css" media="screen" />
    <script src="js/functions.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<body>

    <div class="container">
        <div class="box">

            <div class="txtlg"><h2>LinkFour</h2></div>

            <form action="controllers/login.php" method="post">
                <div class="user"><input type="text" name="user" placeholder="Username"></div>
                <div class="senha"><input type="password" name="password" placeholder="senha"></div><br>

                <!-- Criar botão de verificação e login JS/PHP -->
                <div class="bt"><button type="submit" >Entrar</button></div>
            </form>

            <div class="txt"><h4>Não tem uma conta?<a href="http://localhost/LinkFour/cria%c3%a7%c3%a3o.php"> Cadastre-se</a></h4></div>
            <div class="txt"><a href="controllers/logout.php" onclick="logout()">Sair</a></div>
                    
        </div>
    </div>
    
</body>

</html>

<?php
    session_start();  
?>