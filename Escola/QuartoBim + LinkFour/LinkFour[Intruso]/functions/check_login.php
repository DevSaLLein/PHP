<?php

@session_start();
if(!$_SESSION['user']){
    header('Location: /linkfour/login.php');

}