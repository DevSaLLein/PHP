<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Treinando FOPEN no PHP">
    <title>FOPEN</title>
</head>
<body>
    <?php

        $pasta = 'pasta';
        $arqCOPY = 'arquivado.txt';

        #file_put_contents(nome do arquivo, o que terá nele);
        file_put_contents($arqCOPY , 'COPIADOOOOOO');

        #Verifica se ja existe a pasta com o nome 'pasta', caso não exista ele cria uma pasta com o nome 'pasta';
        if(!is_dir($pasta)){

            mkdir($pasta);
        }

        #O nome do arquivo recebe um nome dinâmico com as horas;
        $nome_arquivo = date('H-i-s'). '.txt';


/*
        abre o $nome_arquivo com o comando w+(
                Abre para leitura e escrita; coloca o ponteiro do arquivo no começo do arquivo e reduz o comprimento do 
                arquivo para zero. Se o arquivo não existir, tenta criá-lo.
        );
*/
        $arquivo = fopen($nome_arquivo, 'w+');
        
            #Escreve dentro do arquivo ;
            fwrite($arquivo, "Minha linha 1 \n");
            fwrite($arquivo, "Minha linha 2 \n");

        #fecha o arquivo;
        fclose($arquivo);

        #mudando o local do arquivo da raiz para a pasta chamada 'pasta';
        $moveArquivo = "$pasta/$nome_arquivo";
        rename($nome_arquivo, $moveArquivo);

        #Verifica se o arquivo existe, tanto faz um dos dois métodos apresentados;
        if(file_exists($moveArquivo) && is_file($moveArquivo)){

            echo file_get_contents($moveArquivo);
        };


        if(is_dir($pasta)){
            foreach(scandir($pasta) as $arquivo){
                 $caminho_arquivo = "$pasta/$arquivo";
                 
                 if(is_file($caminho_arquivo)){
                        unlink($caminho_arquivo);

                    }else {
                      copy("arquivado.txt", "arqSALVO");  
                      echo "Não existe nenhum arquivo em $pasta";          
                    }
                }
            rmdir($pasta);
        }

        /* 
            SCANDIR() => {
                Retorna um array utilizando um diretório ($pasta);
                No exemplo cada instância do array se chama '$arquivo';

            };

            unlink() => {
                Apaga o arquivo;
            }

            copy() => {
                Copia um arquivo;
                Primeiro parâmetro recebe o nome do arquivo que se deseja copiar;
                Segundo Parâmetro recebe como vai se chamar o novo arquivo copiado;
                
            }
        */

        

    ?>
</body>
</html>