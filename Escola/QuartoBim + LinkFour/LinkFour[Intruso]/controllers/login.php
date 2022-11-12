<?php

session_start();

$user = $_POST['user'];
$password = $_POST['password'];
$_SESSION["user"] = $user;


if ($_POST['user'] == '') {
    echo ("
    <script>
    alert('Campo de User Vazio!')
    </script>");
    header('Location: /linkfour/login.php');
}
if ($_POST['password'] == '') {
    echo ("<script>
    alert('Campo de Senha Vazio!')
    </script>");
    header('Location: /linkfour/login.php');
    
} 





if($_POST['user'] != '' && $_POST['password'] != '') {

    var_dump($_POST);

    $servername = "localhost";
    $database = "linkfour";
    $psswrd = "";
    $username = "root";

    $connect = mysqli_connect($servername, $username, $psswrd, $database) or die ('Não foi posisivel conectar');

    if(!isset($_POST['user']) || !isset($_POST['password'])){
        header('location: /linkfour/login.php');
        exit();
    }

    $user = mysqli_real_escape_string($connect, $_POST['user']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $query = "select id, usuario from cadastro where usuario='{$user}' and senha = '{$password}'"; 

    $result = mysqli_query($connect, $query);

    $row = mysqli_num_rows($result);

    if($row == 1){
        $_SESSION['user'] = $user;
        header('Location: /linkfour/customize.php');
        exit();
    }else{
        header('Location: /linkfour/login.php');
        exit();
    }

}

