<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>time(), date(), strtotime()</title>
    </head>
    <body>
        <?php
           
           echo "
                <form method='GET'>
                    <label for='hora1'> Digite a primeira hora: </label>
                    <input type='time' name='hora1'/>
                    <label for='hora2'> Digite a segunda hora: </label>
                    <input type='time' name='hora2'/>
                    <input type='submit' value='Enviar'/> 
                </form> 
           ";

        ?>

        <?php
            $hour1 = strtotime($_GET['hora1']);
            $hour2 = strtotime($_GET['hora2']);

            $diffSegundos = $hour1 - $hour2;
            echo $diffSegundos. " segundo(s)";

            $diffMinutos = ($hour1 - $hour2)/ 60;
            echo "<br>". $diffMinutos. " minuto(s)";

            $diffHoras = ($hour1 - $hour2) / (60 * 60);
            echo "<br>". $diffHoras. " hora(s)";
            
            $hrAtual = date('H:m:s' , strtotime(' -5 hour '));
            // $teste = $hrAtual - $hour1;
                    
            print_r($hrAtual);
        ?>
    </body>
</html>