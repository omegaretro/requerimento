<html lang="pt-BR">
 <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">  
 </head>

<body bgcolor ="black">
<div  class="box-formulario" align = "center">
    <div class="formulario">
 
      <img src = "img/vidalogo.png">
      <form method = "post" action ="envio_cliente.php" class="card">
           <span>
                 <input name='nome' type='text' requered  placeholder="Cliente" class="input-card"/>
            </span>
            <span>
                   <input class="input-card" placeholder="Login" type="text" name="login" requered/>
            </span>
            <span>
                     <input class="input-card" placeholder="Senha" type="text" name="senha" requered/>
            </span>
            
           <div class="box-pulse">
                  <input type = "submit" name = "Salvar" value = "Salvar" class="btn-submit"/>
           </div>
      </form>
    </div>
  </div>
 
</body>
</html>
<?php
include "app/cons.php";
include "app/DLL.php";
extract($_POST);
if (isset($Salvar)){ 
            $consulta = pesquisa(5,NULL, $nome, $login , $senha , NULL);
            banco($server, $user, $password, $db, $consulta);
            cria_user($nome);
            unset($Salvar);
            $local = $local."cadus.php";
            header($local);
}

?>