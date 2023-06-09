<?php
  
include "../../app/cons.php";
include "../../app/DLL.php";
if(!isset($_SESSION)) session_start();
$nome = $_SESSION['sess_id'];
$consulta = pesquisa(8, NULL, $nome, NULL , NULL , NULL);
$result = banco($server, $user, $password, $db, $consulta);
$linha = $result->fetch_assoc();

?>
<html lang="pt-BR">
 <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">  
 </head>

<body bgcolor ="black">
<div  class="box-formulario" align = "center">
    <div class="formulario">
      <img src = "../../img/vidalogo.png">
      <?php
       echo "<font color = 'red' ><h1>".$linha["Cliente"]."</h1></font>";
       do{
				           $foto = $linha["ID"].".jpg";
               $data = explode("-",$linha["Data"]);
             
				          echo $data[2]."/".$data[1]."/".$data[0];
              
				          $img = "img/".$foto;
        
				         echo '<font color = "red" >';
             echo  '<span>';
                 if(file_exists($img)) echo '<img src='.$img.'>';
                 echo'</span><span><textarea  name="texto" rows="8" cols="60" class="input-card">'.$linha["Texto"].'"</textarea>
             </span>';
               echo '<form action = "aprova.php" method = "POST" class="card">';	  
								             echo "<input type = hidden name = id value ='". $linha["ID"]."'>";
                        echo "<span>";
                        echo '<select name = "aprovado" class ="input-card">';
                             echo '<option value ="Sim"> SIM </option>
                                   <option value ="Nao"> NÃO </option>
                             </select>
                    </span>';
							    	         echo '<div class="box-pulse">
                             <input type = "submit" name = "Enviar" value = "Enviar" class="btn-submit"/>
                    </div></form></font>';
								           
          } while ($linha = $result->fetch_assoc());
      ?>
    </div>
  </div>
 
</body>
</html>