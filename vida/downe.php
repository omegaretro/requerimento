 <?php     
      header("Content-Type: application/xml");
      // informa o tipo do arquivo ao navegador
      $path = "xml/email.xml";
      header("Content-Length: ".filesize($path));
      // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($path));
      // informa ao navegador que é tipo anexo e faz abrir a janela de download,
      //tambem informa o nome do arquivo
      readfile($path); // lê o arquivo
      exit; // aborta pós-açõe
?>