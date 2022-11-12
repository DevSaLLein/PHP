<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Revisão</title>
        <meta name="description" content="Holaaaa">
        <meta name='theme-color' content='pink'>
        <link rel="stylesheet" href="style.css">
    </head>
    <body style='background:#141412;'>
        <?php
            echo "
                <form method='post' action='home.php'>

                <input type='radio' name='banda' id='bp' value='BlackPink'/>
                <label for='bp'> Black Pink</label> <br>

                <input type='radio' name='banda' id='bts' value='BTS'/>
                <label for='bts'> BTS </label> <br>

                <input type='radio' name='banda' id='dragons' value='Dragons'/>
                <label for='bts'> Dragons </label> <br> <br>

                <input type='submit' value='Escolher'/>
                </form>
            ";
        ?>

        <?php
            $banda = $_POST['banda']? $_POST['banda'] : 'Não escolhida' ;
            
            echo "<br> <b><i>$banda</i></b>";
        ?>
</body>
</html>