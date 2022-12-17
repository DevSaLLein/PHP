<head>
    <link rel="stylesheet" href="Estilo/style.css">
</head>
<?php
    //Variáveis;
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'tech_point';

    //A variável mais importante do código;
    //A var será encarregada da conexão com o BD;

    $connect = new mysqli(
        $server,
        $user,
        $password,
        $database
    );

    //Caso der algum error, será mostrado para que possa ser corrigido por nós programadores;
    if($connect -> connect_error){
        echo "deu error:". $connect -> connect_error;
    } 

?>