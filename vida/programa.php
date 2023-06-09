<?php
   extract($_POST);
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
      <form enctype='multipart/form-data' method = "post" action ="envio_cliente.php" class="card">
           <input type = "hidden" name ="cliente" value = "<?php echo $nome ?>">
           <span>
                 <input name='foto' type='file' requered class="input-card"/>
            </span>
            <span>
                   <textarea  name="texto" rows="5" cols="40" class="input-card"></textarea>
            </span>
            <span>
                     <input name="data" type = "date" required class = "input-card">
            </span>
             <span>
                  <input name="hora" type = "text"   required placeholder = "00:00" class="input-card"/>
           </span>
           <div class="box-pulse">
                  <input type = "submit" name = "Programar" value = "Enviar para aprovação" class="btn-submit"/>
           </div>
      </form>
    </div>
  </div>
 
</body>
</html>