<?php
  if (!isset($_SESSION)) session_start(); 

    if (isset($_GET['deslogar'])): 
        header('Location: /app/login.php');
        $_SESSION['usuariologado'] = false;
        $_SESSION['usuariologadoId'] = '';
        $_SESSION['usuariologadoNome'] = '';

        session_destroy();
    endif;

    
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['usuariologado'])==true):
    header('Location: /app/login.php');
    session_destroy();
endif;

    define('ROOT',$_SERVER['DOCUMENT_ROOT']);


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

      <script src="../ckeditor4/ckeditor.js"></script>
      <!--<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>-->
      
      
      </head>

    <body>
  <nav>
    <div  class="col s12 m6 push-m3 nav-wrapper teal lighten-2">
      <a href="#!" class="brand-logo">Menu Principal</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li> <a href="/app/index.php" class=""> Inicio </a>     </li>
        <li> <a href="/app/clientes/clientes.php" class=""> Clientes </a>     </li>
        <li> <a href="/app/categorias/categorias.php" class=""> Categorias </a>     </li>
        <li> <a href="/app/usuarios/usuarios.php" class=""> Usuários </a>     </li>
        <li> <a href="/app/publicacoes/publicacoes.php" class=""> Publicacões </a>     </li>
        <li> <a href="" class=""> Usuário Logado: <?php echo $_SESSION['usuariologadoNome']; ?> </a>     </li>
        <li> <a href="?deslogar" class="btn red"> Sair </a>     </li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li> <a href="" class=""> Usuário Logado: <?php echo $_SESSION['usuariologadoNome']; ?> </a>     </li>  
    <li> <a href="/app/index.php" class=""> Inicio </a>     </li>
    <li> <a href="/app/clientes/clientes.php" class=""> Clientes </a>     </li>
    <li> <a href="/app/categorias/categorias.php" class=""> Categorias </a>     </li>
    <li> <a href="/app/usuarios/usuarios.php" class=""> Usuários </a>     </li>
    <li> <a href="/app/publicacoes/publicacoes.php" class=""> Publicacões </a>     </li>
    <li> <a href="?deslogar" class="btn red"> Sair </a>     </li>
    
  </ul>

 

  