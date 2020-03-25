<?php
 
 
 //require_once '/app/categorias/classe/classeCategoria.php';
 
 require_once($_SERVER["DOCUMENT_ROOT"].'/categorias/classe/classeCategoria.php');

 //define('__ROOT__', dirname(dirname(__FILE__)));

 //require_once(__ROOT__.);

  if (!isset($_SESSION)) session_start(); 

    if (isset($_GET['deslogar'])): 
        header('Location: login.php');
        $_SESSION['usuariologado'] = false;
        $_SESSION['usuariologadoId'] = '';
        $_SESSION['usuariologadoNome'] = '';

        session_destroy();
    endif;

    
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['usuariologado'])==true):
    header('Location: login.php');
    session_destroy();
endif;

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
      <!-- esse aqui é o de mobile -->
      <ul id="dropdownCategoria" class="dropdown-content">
        <?php
					$categoria = new Categoria();
					$resultado1 = $categoria->buscarTodosCategorias();
					if (mysqli_num_rows($resultado1) > 0 ): 
						while($dadosCat = mysqli_fetch_array($resultado1)):
				?>
					<li><a class="" href="/index.php?buscaCategoriaEspecifica=<?php echo $dadosCat['id']; ?>"><?php echo $dadosCat['descricao']; ?></a></li>
         
          <li class="divider"></li>
				<?php 
					endwhile; 
					else: 
				?> 
					<li><a href="#!">Necessário Cadastrar</a></li>
				<?php
					endif;
				?>
      </ul>

      <ul id="dropdownCategoria1" class="dropdown-content">
        <?php
					$categoria = new Categoria();
					$resultado2 = $categoria->buscarTodosCategorias();
					if (mysqli_num_rows($resultado2) > 0 ): 
						while($dadosCat = mysqli_fetch_array($resultado2)):
				?>
					<li><a href="/index.php?buscaCategoriaEspecifica=<?php echo $dadosCat['id']; ?>"><?php echo $dadosCat['descricao']; ?></a></li>
          <li class="divider"></li>
				<?php 
					endwhile; 
					else: 
				?> 
					<li><a href="#!">Necessário Cadastrar</a></li>
				<?php
					endif;
				?>
      </ul>

      
  <nav> 
  <div  class="col s12 m6 push-m3 nav-wrapper grey darken-3">
      <a href="#!" class="brand-logo">Menu Principal</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li> <a href="/index.php" class=""> Inicio </a>     </li>
        
        <li><a class="dropdown-trigger" href="#!" data-target="dropdownCategoria1">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>

        <li> <a href="/publicacoes/publicacoes.php" class=""> Publicacões </a>     </li>
        <li> <a href="" class=""> Usuário Logado: <?php echo $_SESSION['usuariologadoNome']; ?> </a>     </li>
        <li> <a href="?deslogar" class="btn red"> Sair </a>     </li>
      </ul>
    </div> 
  </nav>

  <ul id="mobile-demo" class="sidenav">
    <li>
      <div class="user-view">
        <div class="background grey darken-3">
          
        </div>
        <a href="#user"><img class="circle" src="/images/face.png"></a>           

        <a href="#name"><span class="white-text name"><?php echo $_SESSION['usuariologadoNome'] ?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $_SESSION['usuariologadoEmail'] ?></span></a>
      </div>
    </li>

   
    <li><a class="subheader"><i class="material-icons">list</i>Menu</a></li>
    <li><div class="divider"></div></li>
    <li> <a href="/index.php"                   class="waves-effect"> Inicio </a>     </li>

    <li><a class="dropdown-trigger" href="#!" data-target="dropdownCategoria">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
    
    <li> <a href="/publicacoes/publicacoes.php" class="waves-effect"> Publicacões </a>     </li>
    
    <li><div class="divider"></div></li>
    <li> <a href="?deslogar"                        class="waves-effect btn red"> Sair </a>     </li>



  </ul>
  
 

  