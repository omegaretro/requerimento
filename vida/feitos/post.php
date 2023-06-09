<?php
    include "../../app/cons.php";
    include "../../app/DLL.php";
    if(!isset($_SESSION)) session_start();
    
    
    //teste_login($_SESSION['sess_aut'],$local);
?>
<html>
    <head>
            <meta charset = "UTF-8">
             <link rel="stylesheet" type="text/css" href="../../css/stylepost.css">
           
    </head>
    <body>
        <div id="padrao">   
        <form enctype='multipart/form-data' action = "enviar.php" method = "POST" class="card-novo">
            <label for="foto" class="incluir">Foto:</label>
            <input name='foto' type='file' requered /><br/>
            <input type = "hidden" name="dono" id="mensagem" size = 4 value = "<?php echo $_SESSION['sess_id'] ?>"/>
            <label for="mensagem" class="incluir">Mensagem:</label><br/>
            <textarea id="mensagem" name="mensagem" rows="4" cols="85"></textarea>
            <br/>
            <div class="card-footer">  
                <input type = "submit" value = "Enviar" name = "publicar" class="submit"  />
                <!--<input type = "submit" value = "Artes para aprovação" name = "exibir" class="submit" /> -->
                <a href = 'index.php'> <img src = '../../img/fundo/voltar.png' / width = 40 heigth= 40> </a>
            </div>
        </form>
    </div>

    </body>
</html>
