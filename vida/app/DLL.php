<?php
function email($para){
               include "cons.php";
               $assunto = "Nossos serviços";  
               $headers =  'MIME-Version: 1.0'."\r\n";
               $headers .= 'Content-type: text/html; charset=utf-8;';
               $headers .= "Return-Path: sem retorno \r\n";
               $headers .= "From: portfolio@agenciavidadigital.com.br\r\n";
               $headers .= "Reply-To: portfolio@agenciavidadigital.com.br \r\n";
               
               $mensagem = "<html>";
               $mensagem .= "<body>";
               $mensagem .=  '<img src = "'.$localmail.'img/portfolio/P1.png" width = 60% eight = 60% ><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P2.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P3.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P4.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P5.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P6.png" width = 60% eight = 60% ><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P7.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P8.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P9.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P10.png" width = 60% eight = 60%><br/>';
               $mensagem .= '<img src = "'.$localmail.'img/portfolio/P11.png" width = 60% eight = 60% ><br/>';
               $mensagem .= "</body>";
               $mensagem = "</html>";
               mail($para, $assunto, $mensagem, $headers);
            
}

function cria_user($nome){
             $dir = 'clientes/'.$nome;
             $dirimg = 'clientes/'.$nome.'/img';
             if (!file_exists($dir)){
                        mkdir($dir, 0777);
                        mkdir($dirimg, 0777);
             }
             $destino = $dir.'/';
             $origem = 'padrao/';
             $file = scandir($origem);
             foreach ($file as $item => $value){
                            if (!in_array($value,array(".",".."))){
                                      $nomeorigem = $origem."{$value}";
                                      $nomedest =  $destino."{$value}";
                                      if(!copy($nomeorigem,$nomedest));
                            }
             }
           
}


Function teste_login($sessao,$local) {
   if($sessao != "ok"){
		  $local = $local."login.html";
        header($local);
        exit;
    }
	}

Function banco($server, $user, $password, $db, $consulta)
	{
		
	 $banco =  new mysqli($server, $user, $password, $db);
	 if ($banco->connect_error) {
            echo "Falha de conexão referência: (".$banco->connect_errno.") - ".$banco->connect_error;
				echo "<a href = 'index.html'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
            exit();
	 }
	 if (!$resultado = $banco->query($consulta)) {
		        echo "Falha na consulta referência: (".$banco->errno.") - ".$banco->error;
				  echo "<a href = 'index.html'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
				  exit();
	 }
    $banco->close();
	 return $resultado;
	
	}
	
	Function mostrar($result, $tipo)
	{
	 include "cons.php";
	 if ($tipo == "Amizade_pedida"){
	
		  echo "<div class='card-novo'> ";
	    while ($linha = $result->fetch_assoc()){
			
				$foto = $linha["Id_solicita"].".jpg";
            echo "<br/>";
				$img = "img/".$foto;
			   if(file_exists($img)) echo "<img src=" .$img." width = 110 heigth = 140><br/>";
            if(($linha["Id_solicita"] != $_SESSION['sess_id'])){	
				         $cod = $linha["Id_solicita"];
            }else{
                      $cod = $linha["Id_destino"];
            }
				$consulta = "select * from agenda where cod = $cod";
				$sql = banco($server, $user, $password, $db, $consulta);
				$exibe = $sql->fetch_assoc();
            
            echo " Nome:".$exibe["nome"];
            echo " //  Email: ".$exibe["email"];
            $idade = 2022 - $exibe["ano"];
            echo "  idade: ".$idade;
								    if($linha["Status"] == 1){
								           echo "<form action = 'pdo.php' method = 'POST' >";	  
								            echo "<input type = hidden name = id value ='". $linha["id"]."'>";
								            echo "<input type = hidden name = status value ='2'>";
												echo "<div class='card-footer'>";
							    	         echo "<input type = submit name = A_aceitar value = 'Aceitar' class='submit' >";
												echo "</div>";
								            echo "</form>";
										}else{
													  echo "    já é amigo(a) <br/>";
										}
                          
           }
      
           echo "<div class='card-footer'>";
			  echo "<br/><a href = 'incluir.php'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
		     echo "</div>";
		echo "</div>";
	   }
				
		if ($tipo == "mostra_P"){
         echo "<div class='card-novo'> ";
	       while($exibe = $result->fetch_assoc()){
					       
					      $foto = $exibe["cod"].".jpg";
                     echo "<br/>";
							$img = "img/".$foto;
			            if(file_exists($img)) echo "<img src=" .$img." width = 110 heigth = 140><br/>";  
                     echo " Nome:".$exibe["nome"];
                     echo " //  Email: ".$exibe["email"];
                     $idade = 2022 - $exibe["ano"];
                     echo "  idade: ".$idade;
                    
            }
             echo "<div class='card-footer'>";
			    echo "<br/><a href = 'incluir.php'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
		       echo "</div>";
             echo "</div>";
          }
           
	   
				
				
		if ($tipo == "Normal"){
		echo "<div class='card-novo'> ";
		$Cont = 0;
	   while ($linha = $result->fetch_assoc()){
			   $ID_prop = $_SESSION['sess_id'];
				$ID_outro = $linha["cod"];
				$consulta = "select * from amizade where  (Id_solicita = $ID_prop and Id_destino = $ID_outro) or (Id_solicita = $ID_outro and Id_destino = $ID_prop)";
				$sql = banco($server, $user, $password, $db, $consulta);
				if (!$sql->fetch_assoc()){
				    if($linha["cod"] <> $_SESSION['sess_id']){
                        $Cont++;
                        echo "<form action = 'pdo.php' method = 'POST'>";
					         $foto = $linha["cod"].".jpg";
                        echo "<br/>";
				            $img = "img/".$foto;
			               if(file_exists($img)) echo "<img src=" .$img." width = 110 heigth = 140><br/>";
                        echo " Nome:".$linha["nome"];
                        echo " //  Email: ".$linha["email"];
                        $idade = 2022 - $linha["ano"];
                        echo "  idade: ".$idade;
				            echo "<input type = hidden name = origem value ='". $_SESSION['sess_id']."'>";
				            echo "<input type = hidden name = destino value ='".$linha["cod"]."'>";
				            echo "<input type = hidden name = status value ='1'>";
							  
							  echo "<div class='card-footer'>";   
				                echo "<input type = submit name = amizade value = 'solicitar' class='submit' />";
							   echo "</form>";
								echo "</div>";	
							
					 }
            }
		  }
        if ($Cont == 0) echo "****  Nenhum Usuário disponivel para solicitação de amizade   ***";
      
		    echo "<div class='card-footer'>"; 
		      echo "<a href = 'incluir.php'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";		   
		    echo "</div>";
		
	   }
      
		 
	  if ($tipo == "Tabela"){
	   echo "<div class = 'box-formulario' align = 'center'> ";
  	   echo"<table border = 1>";
	     $tabela = "<tr><td><font color = '#e1e1e1'>Nome</font></td><td><font color = '#e1e1e1'>Email</font></td>";
        $tabela .= "<td><font color = '#e1e1e1'>Zap</font></td>";
        $tabela .= "<td><font color = '#e1e1e1'>Instagram</font></td><tr>";
        echo $tabela;
	     while ($linha = $result->fetch_assoc()){
                echo "<tr><td><font color = '#e1e1e1'>".$linha["nome"]."</font></td>";
                echo "<td><font color = '#e1e1e1'>".$linha["email"]."</font></td>";
                echo "<td><font color = '#e1e1e1'>".$linha["watts"]."</font></td>";
                echo "<td><font color = '#e1e1e1'>".$linha["insta"]."</font></td></tr>";
        }
		 echo"</table><br/>";
		 /*echo "<div class='card-footer'>"; 
              echo "<a href = 'incluir.php'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
       echo "</div>";*/
		 echo "</div>";
		 
	  }
			
		if ($tipo == "Post"){
      echo "<font color = 'white'>";
      $linha = $result->fetch_assoc();
      echo '<table border="1" bordercolor= "white" width="100%" height="100%">';
      echo "<tr>";
         echo '<td align="center" valign="middle" height="10%" colspan="4"> ';   
                echo "<h1>".$linha["Cliente"]."</h1>";
        echo "</td>";
      echo "</tr>"; 
      
	  do{
				   $foto = $linha["ID"].".jpg";
               $data = explode("-",$linha["Data"]);
             
				   echo '<td align="center" valign="center" width="10%">'.$data[2]."/".$data[1]."/".$data[0].'</td>';
              
				   $img = "clientes/".$linha["Cliente"]."/img/".$foto;
              
			      if(file_exists($img)) echo '<td align="center" valign="center" width="30%"><a url = '.$img.'><img src='.$img.' width = 420 heigth = 450></a></td>';
        
				   echo '<td align="Justfy" valign="top" width="50%">'.$linha["Texto"].'</td>';
               echo '<td align="center" valign="center" width="5%">';
                                    echo "<form action = 'feito.php' method = 'POST' >";	  
								            echo "<input type = hidden name = id value ='". $linha["ID"]."'>";
												echo "<div class='card-footer'>";
							    	         echo "<input type = submit name = Feito value = 'Feito' class='submit' >";
												echo "</div>";
								            echo "</form>";
               echo '</td>';
             echo "</tr>";  
				//echo "</div>"; 
			   	
          } while ($linha = $result->fetch_assoc());
			echo "</table>"; 
			echo "</font>";
			echo "<div class='card-footer'>"; 
              echo "<a href = 'afazer.php'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
         echo "</div>";
	    
       echo "</div>";
		}
      
			
			
			
			
			if ($tipo == "Atualiza"){
				
  	      include "cons.php";
		 
	     if ($linha = $result->fetch_assoc()){
							  if ($linha["mes"] < 10 and $linha["dia"] > 10){
									         $d = $linha["ano"]."-0".$linha["mes"]."-".$linha["dia"];
							  }else{
									       if ($linha["mes"] > 10 and $linha["dia"] < 10){
																         $d = $linha["ano"]."-".$linha["mes"]."-0".$linha["dia"];
									       }else{
									           if ($linha["mes"] < 10 and $linha["dia"] < 10){
																				     $d = $linha["ano"]."-0".$linha["mes"]."-0".$linha["dia"];
									           }else{
																					   $d = $linha["ano"]."-".$linha["mes"]."-".$linha["dia"];
																				}
																}
									}
						}

         echo"
								
				<form enctype='multipart/form-data' action = 'pdo.php' method = 'POST' class='card-novo'>";
				$foto = $linha["cod"].".jpg";
				$img = "img/".$foto;
			   if(file_exists($img)) echo "<img src=" .$img." width = 110 heigth = 140 ><br/><br/> ";
				echo "<input type = 'hidden' name='cod' value = ".$linha["cod"].">
            <input name='foto' type='file'/><br/>
            <label for='nome' class='incluir'>Nome:</label>
            <input type = 'text' name='nome' size = '80' value = '".$linha["nome"]."'><br/>
            <label for='end' class='incluir'>Endereço:</label>
            <input type = 'text' name='end' size = '80' value = '".$linha["endereco"]."'><br/>
											  <label for='cidade' class='incluir'>Cidade: </label>
                   <select name='cidade'>";
                    for($I = 0; $I <= 9; $I++){
										if ($ci[$I] == $linha["Cidade"]){
                                echo "<option value= '".$ci[$I]."' selected >".$ci[$I]."</option>";
										}else{
											echo "<option value= '".$ci[$I]."'>".$ci[$I]."</option>";
										}
                    }
                    echo "</select><br/>
															   <label for='uf' class='incluir'>UF: </label>
                   <select name='uf'>";
                    for($I = 0; $I <= 9; $I++){
								 if ($u[$I] == $linha["UF"]){
                               echo "<option value= '".$u[$I]."'selected >".$u[$I]."</option>";
								 }else{
										echo "<option value= '".$u[$I]."'>".$u[$I]."</option>";
								}   
                     }
                    echo "</select><br/>
                
           <label for='cep' class='incluir'>CEP: </label> 
            <input type = 'text' name='cep' value = '".$linha["CEP"]."'/><br/>
            <label for='email' class='incluir'>E-mail: </label>
            <input type = 'email' name='email' value = '".$linha["email"]."'><br/>
             <label for='fone' class='incluir'>Tel: </label> 
            <input type = 'text' name='fone' value = '".$linha["fone"]."' onblur = 'mascaraDeTelefone(this)'><br/>
            <label for='data' class='incluir'>Nascimento:</label> 
				<input id='date' name = 'data' type='date' value = '".$d."'><br/><br/>     
            <div class='card-footer'> 
                     <input type = 'submit' value = 'Salvar' name = 'B6' class='submit' />
							 <br/><a href = 'incluir.php'> <img src = 'img/fundo/voltar.png' / width = 40 heigth= 40> </a>
				</div>
        </form>";
		 
      }
					 
	  }
	

Function pesquisa($S, $cod, $nome , $email , $watts , $insta )
	{
		
	switch ($S) {
    case 1:
        $data = date("Y-m-d");
        $resultado = "INSERT INTO cadvida(nome, email , watts , insta , data) VALUES ('$nome','$email', '$watts', '$insta','$data')";
        break;
    case 2:
        //$data = date("Y-m-d");
        $resultado = "select * from cadvida where  '$cod' <= data <= '$nome' order by nome";
        /*if($nome <> Null){
           $teste = mb_strtoupper($nome);
           $resultado = "select * from agenda where upper(nome) LIKE '$teste%'";
         }
         if($email <> Null){
            $teste = mb_strtoupper($email);
           $resultado = "select * from agenda where upper(email) LIKE '$teste%'";
        }*/
        break;
	case 3:
          //pesquisa(3,NULL, $dono, $mensagem , NULL , NULL);
          $resultado = "INSERT INTO envios (ID, Cliente , Texto , Data , Aprovado, Hora, Obs) VALUES (NULL,'$cod','$nome', '$email','FALSE', '$watts',NULL)";
          break;
	case 4:
       
          $resultado = "select ID, Cliente from envios where Cliente = '$nome' ORDER BY ID DESC LIMIT 1";
          break;
	case 5:
              $senha = md5($watts);
              $resultado = "INSERT INTO pass(Login, Senha, Cliente) VALUES ('$email', '$senha', '$nome')";
              break;
	case 6:
              $pass = md5($nome);
              $resultado = "select * from pass where (Login = '$cod' and Senha = '$pass')";
				  break;
	case 7
              $resultado = "UPDATE envios SET  Aprovado = TRUE WHERE ID = '$nome'";
				 break;
	case 8:
              $resultado = "select * from envios where  Aprovado = 'FALSE'  and Cliente = '$nome' ORDER BY ID";
				  break;
	case 9:
              $resultado = "SELECT DISTINCT * FROM agenda,amizade,post where ((amizade.Id_solicita = $cod OR amizade.Id_destino = $cod) AND amizade.Status = 2) AND (amizade.Id_solicita = agenda.cod OR amizade.Id_destino = agenda.cod) and (amizade.Id_solicita = post.Id_dono OR amizade.Id_destino = post.Id_dono) GROUP BY post.Id";
				 break;
	case 10:
              $resultado = "select * from post";
				 break;
	case 11:
              $resultado = "select * from amizade where Id_solicita = $cod and Status = 2";
				  break;
	case 12:
        $resultado = "select * from cadvida where nome = '$nome'";
		  break;
		case 13:
			$senha = md5($end);
        $resultado = "UPDATE jogadores SET  Pass = $senha WHERE User = $cod";
		  break;
	}
	
	
		return $resultado;
}
		
Function anti_sql_injection($str) {
        if (!is_numeric($str)) {
            $str = get_magic_quotes_gpc() ? stripslashes($str) : $str;
            $str = function_exists('mysql_real_escape_string') ? mysql_real_escape_string($str) : mysql_escape_string($str);
        }
        return $str;
    }
    
function XML($label,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$file){
	
   $xml = '<?xml version="1.0" encoding="utf-8"?>';
   $xml .= '<links>';
	$xml .= '<link>';
	if(isset($x1)) $xml .= '<'.$label[0].'>'. $x1 .'</'.$label[0].'>';
	if(isset($x2))$xml .= '<'.$label[1].'>'. $x2.'</'.$label[1].'>';
	if(isset($x3))$xml .= '<'.$label[2].'>'. $x3.'</'.$label[2].'>';
   if(isset($x4))	$xml .= '<'.$label[3].'>'. $x4.'</'.$label[3].'>';
	if(isset($x5))$xml .= '<'.$label[4].'>'. $x5.'</'.$label[4].'>';
	if(isset($x6))$xml .= '<'.$label[5].'>'. $x6.'</'.$label[5].'>';
	if(isset($x7))$xml .= '<'.$label[6].'>'. $x7.'</'.$label[6].'>';
   if(isset($x8))	$xml .= '<'.$label[7].'>'. $x8.'</'.$label[7].'>';
	if(isset($x9))$xml .= '<'.$label[8].'>'. $x8.'</'.$label[8].'>';
   if(isset($x10))	$xml .= '<'.$label[9].'>'. $x10.'</'.$label[9].'>';
   $fim = count($label) - 1;
   $xml .= '<modo>'. $label[$fim].'</modo>';
	$xml .= '</link>';

// Fechamento da raiz
$xml .= '</links>';

$fp = fopen($file, 'w+');
fwrite($fp, $xml);
fclose($fp);
        
}

    
?>

