<?php
    include "app/cons.php";
    include "app/DLL.php";
    extract($_POST);
    
    $consulta = pesquisa(2, $antes, $depois, Null, Null,Null);
    $result = banco($server, $user, $password, $db, $consulta);
   if(isset($Exml)){
           $xml = '<?xml version="1.0" encoding="utf-8"?>';
           $xml .= '<links>';
           while ($linha = $result->fetch_assoc()){
                $xml .= '<link>';
                $xml .= '<Email>'. $linha["email"] .'</Email>';
                $xml .= '</link>';
           }
           $xml .= '</links>';

           $fp = fopen("xml/email.xml", 'w+');
           fwrite($fp, $xml);
           fclose($fp);
            
          /*  $boundary = "XYZ-".md5(date("dmYis"))."-ZYX";
            $assunto = "Envio de XML";  
            $path = 'xml/email.xml';
            $fileType = mime_content_type( $path );
            $fileName = basename( $path );

             // Pegando o conteúdo do arquivo
            $fp = fopen( $path, "rb" ); // abre o arquivo enviado
            $anexo = fread( $fp, filesize( $path ) ); // calcula o tamanho
            $anexo = chunk_split(base64_encode( $anexo )); // codifica o anexo em base 64
            fclose( $fp ); // fecha o arquivo
            // cabeçalho do email
            $headers = "MIME-Version: 1.0" . PHP_EOL;
            $headers .= "Content-Type: multipart/mixed; ";
            $headers .= "boundary=" . $boundary . PHP_EOL;
            $headers .= "$boundary" . PHP_EOL;
            
            $mensagem  = "--$boundary" . PHP_EOL;
            $mensagem .= "Content-Type: text/html; charset='utf-8'" . PHP_EOL;
            $mensagem .= "Envio de arquivo xml"; // Adicione aqui sua mensagem
            $mensagem .= "--$boundary" . PHP_EOL;
            
            $mensagem .= "Content-Type: ". $fileType ."; name=\"". $fileName . "\"" . PHP_EOL;
            $mensagem .= "Content-Transfer-Encoding: base64" . PHP_EOL;
            $mensagem .= "Content-Disposition: attachment; filename=\"". $fileName . "\"" . PHP_EOL;
            $mensagem .= "$anexo" . PHP_EOL;
            $mensagem .= "--$boundary" . PHP_EOL;
            $para = "marco.paranhos1@gmail.com";
            
            mail($para, $assunto, $mensagem, $headers);
            $local = $local."mostra.html";
            header($local);
            exit;*/
   }
   if(isset($Txml)){
           $xml = '<?xml version="1.0" encoding="utf-8"?>';
           $xml .= '<links>';
           while ($linha = $result->fetch_assoc()){
                $xml .= '<link>';
                $xml .= '<Nome>'. $linha["nome"] .'</Nome>';
                $xml .= '<Email>'. $linha["email"] .'</Email>';
                $xml .= '<Zap>'. $linha["watts"] .'</Zap>';
                $xml .= '<Insta>'. $linha["insta"] .'</Insta>';
                $xml .= '</link>';
           }
           $xml .= '</links>';

           $fp = fopen("xml/tudo.xml", 'w+');
           fwrite($fp, $xml);
           fclose($fp);
           

   }
 
  
?>
<html lang="pt-BR">
 <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">  
 </head>

<body bgcolor ="black">
<div  class="box-formulario" align = "center">
     
    <div class="formulario">
            <img src = "img/vidalogo.png">
            <div class="botao">
           <span>
                 <a href = "downe.php"> <img src = "img/e-mail.png" width = "5%"></a>
                 <a href = "downt.php"> <img src = "img/todos.png"></a>
            </span>
            <span>
                  
            </span>
         </div>    
    </div>
  </div>
 
</body>
</html>
