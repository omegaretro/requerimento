<?php
include "../../app/cons.php";
include "../../app/DLL.php";
extract($_POST);
if (isset($publicar)){
   if($_FILES['foto']['name'] != NULL){
        $consulta = pesquisa(3,NULL, $dono, $mensagem , NULL , NULL);
        banco($server, $user, $password, $db, $consulta);
        
        $consulta = pesquisa(4,NULL, $dono, NULL , NULL , NULL);
        $result = banco($server, $user, $password, $db, $consulta);
        
         $linha = $result->fetch_assoc();
         $target = "img/".$linha["ID"].".jpg" ;
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)) echo "OK!";
   }else{
          $local = $local."clientes/".$dono."/falha.html";
          header($local);
         exit;
   }
    unset($publicar);
    unset($_FILES['foto']);
    $local = $local."clientes/".$dono."/certa.html";
    header($local);
    exit;
}
?>