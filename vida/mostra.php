<html lang="pt-BR">
 <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">  
 </head>

<body bgcolor = "black">
 <div  class="box-formulario" align = "center">
    <div class="formulario">
 
      <img src = "img/vidalogo.png">
<?php
    include "app/cons.php";
    include "app/DLL.php";
    extract($_POST);
    
    $consulta = pesquisa(2, $antes, $depois, Null, Null,Null);
    $result = banco($server, $user, $password, $db, $consulta);
    mostrar($result, "Tabela");
    
?>
      <form method = "post" action ="fxml.php" class="card">
         
                 <input type = "hidden" name="antes" value ="<?php echo $antes?>" />
            
                   <input name="depois" type = "hidden"  value ="<?php echo $depois?>" />
         
           <div class="box-pulse">
                  <input type = "submit" name = "Exml" value = "Exportar email" class="btn-submit"/>
           </div>
           <div class="box-pulse">
                  <input type = "submit" name = "Txml" value = "Exportar tudo" class="btn-submit"/>
           </div>
      </form>
    </div>
 </div>
 </body>
</html>