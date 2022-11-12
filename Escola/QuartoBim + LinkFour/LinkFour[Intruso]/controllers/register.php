<?php

@$fone = $_POST['fone'];
@$nome = $_POST['nome'];
@$usuario = $_POST['usuario'];
@$senha = $_POST['senha'];

if($fone == null){
    echo("
    <script>
    alert('Campo de Telefone Vazio!')
    </script>");
}

if($nome == null){
    echo("<script>
    alert('Campo de Nome Vazio!')
    </script>");
}

if($usuario == null){
    echo("<script>
    alert('Campo de Usuario Vazio!')
    </script>");
}

if($senha == null){
    echo("<script>
    alert('Campo de Senha Vazio!')
    </script>");
}

else{
$servername = "localhost";
$database = "linkfour";
$password = "";
$username = "root";

// Create connection
 $conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
 if (!$conn) {
 }

 $sql = "INSERT INTO cadastro (id, fone, nome, usuario, senha) VALUES ( ' ' , '$fone', '$nome', '$usuario', '$senha')";

 if (mysqli_query($conn, $sql)){
 	echo "<script>
     alert('CONTA CRIADA')
     </script>"; 
 }
 mysqli_close($conn);
}

// Não está imprimindo o  alert de conta criada
header('Location: /linkfour/register.php');