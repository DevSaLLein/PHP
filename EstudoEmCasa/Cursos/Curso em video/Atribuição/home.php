<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $produto = $_GET['a'];
        $produto+= ($produto * 10 / 100);
        echo number_format($produto , 2 , "," , ".");
    ?>
</body>
</html>