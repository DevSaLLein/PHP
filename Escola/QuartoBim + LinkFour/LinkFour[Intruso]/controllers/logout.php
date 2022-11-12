<?php
session_start();
session_destroy();
header('Location: /linkfour/login.php');
exit();