<?php
session_start();

$icon = $_POST["imagem"];
$link = $_POST["link"];
$user = $_SESSION["user"];

$servername = "localhost";
$database = "linkfour";
$password = "";
$username = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "INSERT INTO customize (id_customize, usuario, icon, link) VALUES ( ' ' ,'$user', '$icon', '$link')";

if (mysqli_query($conn, $sql)) {
    header('Location: /linkfour/customize.php');
    exit();
} 
