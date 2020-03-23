<?php


if (!isset($_SESSION)) session_start(); 

if (isset($_SESSION['usuariologadoNome'])):
    if ($_SESSION['usuariologadoNome']!=""):
        header('Location: index.php');
    endif;
endif;


//if ($_SESSION['usuarioLogado']==false):
    //header('Location: index.php');
//endif;

include_once 'conexao\db_connect.php';
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

      <!-- Google login -->
      <script src="https://apis.google.com/js/platform.js" async defer></script>

      <!--<meta name="google-signin-client_id" content="797425747803-dtk8n7ob6fjrhtqbnkjs4eg7nqjmjlhl.apps.googleusercontent.com">-->

    </head>

    <body>

<div class="row">
	<div class="col s8 m6 push-m3 push-s2  ">
		<h3 class="light"> Login  </h3>

        <form action="usuarios/classe/validaLogin.php" method="POST">

            <div class="input-field col s12">
                <input type="text" name="email" id="email">
                <label for="email"> E-mail </label>
            </div>
            
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha">
                <label for="senha"> Senha </label>
            </div>

            <button type="submit" class="btn" name="btn-verificaLogin"> Entrar </button>
              
        </form>

    

    </div>
    
</div>



<?php

?>
     