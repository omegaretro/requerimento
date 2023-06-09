<?php
include "../../app/cons.php";
include "../../app/DLL.php";
if(!isset($_SESSION)) session_start();
$nome = $_SESSION['sess_id'];
extract($_POST);
if (isset($Enviar)){
            if ($aprovado == "Sim") $consulta = "UPDATE envios SET  Aprovado = TRUE WHERE ID = '$id'";
            if ($aprovado == "Nao") $consulta = "UPDATE envios SET  Obs = '$texto' WHERE ID = '$id'";  
            banco($server, $user, $password, $db, $consulta);
            $local = $local."/clientes/".$nome."/";
            header($local);
}

?>