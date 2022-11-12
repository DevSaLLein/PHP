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
    $file = fopen ("planilha.csv" , "r");
    $row = 0;
    while( $line = fgetcsv($file , 1000 , ";")) {
        if ( $row++ == 0) {
            continue;
        }
        $pessoa[] = [
            "nome" => $line[0],
            "Email" => $line[1],
            "Tel" => $line[2],

        ];
    }
    print_r($pessoa);
    fclose($file);

   ?>
</body>
</html>