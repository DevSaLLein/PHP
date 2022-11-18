<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <meta name="description" content="Cadastro para um programa do governo IMEM">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <?php
            $estados = array(
                'CE' => 'Ceará',
                'BA' => 'Bahia',
                'AM' => 'Amazônia'
            );

            echo "
                <fieldset>
                <legend> Sign in </legend>
                    <form method ='POST'>
                        <label for='name'>Seu nome completo: </label>
                        <input type='text' name='name' placeholder='clique aqui' id='name' spellcheck='on'/> <br>

                        <label for='email'>Seu email: </label>
                        <input type='text' name='email' placeholder='clique aqui' id='email' spellcheck='on'/> <br>

                        <label for='tel'>Telefone: </label>
                        <input type='number' name='tel' placeholder='clique aqui' id='tel' spellcheck='on'/> <br>

                        <label for='est'>Estado: </label>
                        <select name='estado' id='est'>
            
            ";

            foreach($estados as $key => $value){
                echo "
                    <option value=".$value.">".$key."</option>
                ";
            }

            echo "
                        </select>

                        <input type='submit' value='Enviar'/>
                    </form>
                </fieldset>
            "; 
  
       ?>
       
       <?php
        $pasta = 'Cadastros';
        $rand = rand(1, 10000000);
        
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $estado = $_POST['estado'];
        
        
        switch($nome){
            case 'Isaac':
                $nome = "$nome, Olá desenvolvedor desse site KKKK";
            break;

            case 'Jalyson':
                $nome = "$nome, Olá professor";
            break;

            case 'NewDate':
                $nome= "$nome, Olá Nildete que não conheço";
            break;

            default:
                $nome = "$nome";
            
        }

        echo $nome;

        if(!is_file("CadastroNum".$rand)){
            $nome_arquivo = "CadastroNum";
        }

        $fp = fopen($nome_arquivo, 'w+');

            fwrite($fp, "Ola amigo! \n");
            fwrite($fp, "Seu nome: $nome \n");
            fwrite($fp, "Seu email: $email");
            fwrite($fp, "Seu telefone: $tel");
            fwrite($fp, "Seu estado: $estado");

        fclose($fp); 

        if(!is_dir($pasta)){
            mkdir($pasta);
        };

        $move_arquivo = "$pasta/$nome_arquivo".$rand;
        rename($nome_arquivo, $move_arquivo);

        $date = date('H:i:s', strtotime('-4 hour'));
        

       ?>
    </body>
</html>