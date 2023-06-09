<?php
extract($_POST);
include "../app/cons.php";
include "../app/DLL.php";

if(!isset($_SESSION)) session_start();

if (isset($Login)) {

        $consulta = pesquisa(6, $login, $senha, Null, Null,Null);
        $result = banco($server, $user, $password, $db, $consulta);
        $linha = $result->fetch_assoc(); // reference
        if ($linha["Cliente"]) {
                                $_SESSION['sess_id'] = $linha["Cliente"];
                                $local = $local."clientes/".$linha["Cliente"];
                                header($local);
                                exit;
                            }else{
                                $local = $local."clientes/proibido.html";
                                header($local); 
                                exit;
                           }                 
 }

 ?>
 