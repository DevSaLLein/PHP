<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TesteFinal</title>

    </head>

    <body>
        <?php
            echo "
                <fieldset>
                    <form method='GET'>
                        <label for='idData1'> Hora Inicial</label>
                        <input type='date' id='idData1' name='d1'/>

                        <label for='idData2'> Hora Final</label>
                        <input type='date' id='idData2' name='d2'/>
                        </br>


                        <label for='hora1'>Hora Inicial</label>
                        <input type='time' name='h1' id='hora1'/>

                        <label for='hora2'>Hora Final</label>
                        <input type='time' name='h2' id='hora2'/>

                        <input type='submit' value='Enviar'/>
                    </form>
                </fieldset>
            ";
        ?>

        <?php
            ## NEW DATETIME();
            $data1 = new DateTime($_GET['d1']);
            $data2 = new DateTime($_GET['d1']);
            $diff = $data1 -> diff($data2);
            
            echo $diff -> format('%R%a dias');
            
            #sub -> Para subtrair;
            $data1MaisDuasSemanas = $data1 -> add(new DateInterval('P2W'));

            echo $data1MaisDuasSemanas -> format('d/m/Y');

            echo "<br>";
            echo "<hr>";
            echo "<br>";

            ## Date(), TIME()
            $hora1 = Date('H:i:s', strtotime($_GET['h1']));

            echo $hora1;
        ?>
    </body>

        
                    
        

</html>