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

include_once 'conexao/db_connect.php';
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      
        <link rel="stylesheet" type="text/css" href="usuarios/formatacao/css.css">
	
		
		<script type="text/javascript" src="usuarios/formatacao/js.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=0.8"/>
		

      <!--<meta name="google-signin-client_id" content="797425747803-dtk8n7ob6fjrhtqbnkjs4eg7nqjmjlhl.apps.googleusercontent.com">-->

    </head>


    <body>


    <div class="login-page">
  <div class="form">
    <h2> Login </h2>
    <form class="login-form" action="usuarios/classe/validaLogin.php" method="POST" >
      <input type="text" placeholder="E-mail" name="email" id="email">
      <input type="password" placeholder="Senha"name="senha" id="senha"/>

      <button type="submit" class="btn" name="btn-verificaLogin"> Entrar </button>
      
      <p class="message">Não Registrado? <a href="usuarios/formularioCadastro.php?novo">Criar Conta</a></p>
    </form>

    
  </div>
</div>
    </body>
</html>

     