<?php
include "app/cons.php";
include "app/DLL.php";
extract($_POST);
if (isset($Feito)){
            $consulta = pesquisa(7, NULL, $id, NULL , NULL , NULL);
            banco($server, $user, $password, $db, $consulta);
            $local = $local."afazer.php";
            header($local);
}

?>