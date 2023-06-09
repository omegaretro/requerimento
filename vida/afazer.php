<?php
include "app/cons.php";
include "app/DLL.php";
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
      <form method = "post" action ="programa.php" class="card">
           
            <span>
                 <select name = "nome" class ="input-card">
                    <?php
                        $consulta = "select Cliente from pass order by Cliente";
                        $result  = banco($server, $user, $password, $db, $consulta);
                        while($linha = $result->fetch_assoc()){
                              echo '<option value ="'.$linha['Cliente'].'">'.$linha['Cliente'].'</option>';
                        }
                    ?>
                    
                 </select>
            </span>
           <div class="box-pulse">
                  <input type = "submit" name = "Exibir" value = "Programar" class="btn-submit">
           </div>
      </form>
    </div>
  </div>
 
</body>
</html
