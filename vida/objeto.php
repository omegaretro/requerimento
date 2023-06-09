<?php
include "app/cons.php";
include "app/DLL.php";

extract($_POST);

if (isset($Salvar)){
            $consulta = pesquisa(12, NULL, $nome, $para , $watts , $insta);
            $result = banco($server, $user, $password, $db, $consulta);
            $linha = $result->fetch_assoc();

           if($linha["nome"] == NULL){
                 $consulta = pesquisa(1, NULL, $nome, $para , $watts , $insta);
                 banco($server, $user, $password, $db, $consulta);
                 email($para);
                 $local = $local."Obrigado.html";
                 header($local);
            }else{
                 $local = $local."cadastrado.html";
                 header($local);        
            }    
} 

?>