<?php
 if(!isset($_SESSION)) session_start();
 $nome = $_SESSION['sess_id'];
?>
<html>
    <head>
              <meta charset = "UTF-8">
             <link rel="stylesheet" type="text/css" href="../../css/stylepost.css">
            
    </head>
   <body>
   <div id="padrao">  
     <form method = "post" action ="index.php" class="card-novo">
          <div align ="center">
            <font color = "white"><h2><?php echo $nome; ?></h2></font>
            <div class="card-footer">   
               <input type = "submit" name = "postar" value = "Enviar para Aprovação" class="submit">
               <input type = "submit" name = "aprovar" value = "Aprovar artes" class="submit">
         </div>
        </div>
    </form>
  <div>
</body>
</html>
<?php
include "../../app/cons.php";
extract($_POST);
if (isset($postar)){
      $local = $local."clientes/".$nome."/post.php";
      header($local);
}
if (isset($aprovar)){
          $local = $local."clientes/".$nome."/aprovar.php";
         header($local);
 
}

?>