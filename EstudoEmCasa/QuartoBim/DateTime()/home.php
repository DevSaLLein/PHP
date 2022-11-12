<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DateTime()</title>
    </head>
    <body>
       <?php

            echo "<form method='get'>";
            
            echo "
                <fieldset>
                    <legend> Dados </legend>
                    <section> 
                        <label for='hora1'> Digite uma hora: </label>
                        <input type='date' name='data1'>

                        <label for='hora2'> Digite outra hora: </label>
                        <input type='date' name='data2'>
                    </section>
                    <input type='submit' value='Enviar'>
                </fieldset>

            ";
            echo "</form>";

       ?>

       <?php

            function hora($data1 = 0, $data2 = 0){
                # Diferença entre duas datas =>
                $diff = $data1 -> diff($data2);
                echo " data dada => ". $diff -> format('%R%a dias') . "<br>";

                #Data atual mais dois dias =>
                $dataAtual = new DateTime();
                $dataAtual -> add( new DateInterval('P2D'));
                echo " data atual => ". $dataAtual -> format('d/m/Y');

                #Data dada mais dois dias =>
                $data1 -> add( new DateInterval('P2D'));
                echo " <br> Data Mais duas semanas => " .$data1 -> format('d/m/Y');

                echo "<br>";

                echo "
                    <table border='1'>
                        <tr>
                            <th> Dados </th>
                            <th> O que é?</>
                        </tr>

                        <tr> 
                            <td> 
                                ". $dataAtual -> format('d/m/Y') ." 
                            </td> 

                            <td> 
                                <== Data Atual
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                ". $diff -> format('%R%a dias') ."
                            </td>

                            <td> 
                                <==Diferença de Datas 
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                ". $data1 -> format('d//m/Y') ."
                            </td> 

                            <td>
                                <==DataDadaMais2Dias
                            </td>
                        </tr>

                    </table>
                ";

            }
            hora(
                new DateTime($_GET['data1']), 
                new DateTime($_GET['data2'])
            );

       ?>
    </body>
</html>