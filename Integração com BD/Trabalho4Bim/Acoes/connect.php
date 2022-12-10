<head>
    <link rel="stylesheet" href="Estilo/style.css">
</head>
<?php
    
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'tech_point';

    $connect = new mysqli(
        $server,
        $user,
        $password,
        $database
    );

    if($connect -> connect_error){
        echo "deu error:". $connect -> connect_error;
    } else {
        echo "  conexão realizada com sucesso";
    }

?>