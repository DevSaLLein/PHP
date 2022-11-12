<?php
session_start();

@$user = $_POST['user'];
@$password = $_POST['password'];

header("Location: /linkfour/customize.php");