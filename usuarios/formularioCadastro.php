<?php
if (!isset($_SESSION)) session_start(); 



//include_once '../includes/header.php';
require_once '../conexao/db_connect.php';
require_once 'classe/classeUsuario.php';

?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=0.8"/>      
      </head>
	  <body>


<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $usuario = new Usuario();
                if (isset($_GET['novo'])): 
                    echo "Cadastro de Usuario";
                endif;
                if (isset($_GET['editar'])): 
                    echo "Editar Usuario";
                
                    $usuario->buscarUsuario(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                if (isset($_GET['excluir'])): 
                    echo "Excluir Usuario"; 

                    $usuario->buscarUsuario(mysqli_escape_string($connect, $_GET['excluir']));
                endif;
            ?>
        </h3>

        <form action="classe/controllerUsuario.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $usuario->id; ?>" >
                <label for="id"> ID: <?php echo $usuario->id; ?> </label>
            </div>

            <br><br>

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $usuario->nome; ?>  "   >
                <label for="nome"> Nome </label>
            </div>

            <div class="input-field col s12">
                <input type="password" name="senha" id="senha" value="<?php echo $usuario->senha; ?>" >
                <label for="senha"> Senha </label>
            </div>

            <div class="input-field col s12">
                <input class="validate"  type="email" name="email" id="email" value="<?php echo $usuario->email; ?>" >
                <label for="email"> E-mail </label>
            </div>

            

            <?php 
                  if (isset($_GET['novo'])): ?>
                    <button type="submit" class="btn" name="btn-cadastrar"> Cadastrar </button>
            <?php endif; ?>
                   
                  
        </form>
    
    
    </div>
</div>


    

<?php

include_once '../includes/footer.php';
?>
     

