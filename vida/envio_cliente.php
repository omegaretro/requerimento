
<?php
include "app/cons.php";
include "app/DLL.php";
extract($_POST);

if (isset($Programar)){
   if($_FILES['foto']['name'] != NULL){
        $consulta = pesquisa(3,$cliente, $texto, $data , $hora , NULL);
        banco($server, $user, $password, $db, $consulta);
        
        $consulta = pesquisa(4,NULL, $cliente, NULL , NULL , NULL);
        $result = banco($server, $user, $password, $db, $consulta);
        
         $linha = $result->fetch_assoc();
         $target = 'clientes/'.$cliente.'/img/'.$linha["ID"].'.jpg';
   
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)) echo "OK!";
   }else{
          $local = $local."falha.html";
          header($local);
         exit;
   }
    unset($publicar);
    unset($_FILES['foto']);
    $local = $local."certa.html";
    header($local);
    exit;
}

?>
