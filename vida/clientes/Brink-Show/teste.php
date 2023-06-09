<?php
  
include "../../app/cons.php";
include "../../app/DLL.php";
//if(!isset($_SESSION)) session_start();
//$nome = $_SESSION['sess_id'];
$nome = "Brink-Show";
            $consulta = pesquisa(8, NULL, $nome, NULL , NULL , NULL);
            $result = banco($server, $user, $password, $db, $consulta);
            $linha = $result->fetch_assoc();
             echo "<font color = 'red' ><h1>".$linha["Cliente"]."</h1></font>";
       do{
				           $foto = $linha["ID"].".jpg";
                           $data = explode("-",$linha["Data"]);
             
				          echo $data[2]."/".$data[1]."/".$data[0];
              
				          $img = "img/".$foto;
                         echo $img;
			          if(file_exists($img)) echo '<img src='.$img.'>';
        
				         echo '<span>
                     <textarea  name="texto" rows="5" cols="40" class="input-card">'.$linha["Texto"].'"</textarea>
                   </span>';
               echo '<form action = "aprovado.php" method = "POST" class="card">';	  
					echo "<input type = text name = id value ='". $linha["ID"]."'>";
                     echo '<div class ="input-card">';
                     echo "aprovada?";
                        echo '<input type= "radio" name = "aprova" value = "sim">Sim';
                        echo '<input type= "radio" name = "aprova" value = "nao">Não';
                     echo "</div>";
					echo '<div class="box-pulse">
                             <input type = "submit" name = "Enviar" value = "Enviar" class="btn-submit"/>
                      </div>
                    </form>';
                    
								           
          } while ($linha = $result->fetch_assoc());
      
      
?>