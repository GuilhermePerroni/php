<?php
 
 
 //require_once '/categorias/classe/classeCategoria.php';

 require_once($_SERVER["DOCUMENT_ROOT"].'/usuarios/classe/classeUsuario.php');
 
 require_once($_SERVER["DOCUMENT_ROOT"].'/categorias/classe/classeCategoria.php');


  if (!isset($_SESSION)) session_start(); 

    if (isset($_GET['deslogar'])): 
        header('Location: /login.php');
        $_SESSION['usuariologado'] = false;
        $_SESSION['usuariologadoId'] = '';
        $_SESSION['usuariologadoNome'] = '';
        $_SESSION['usuariologadoEmail'] = '';
        $_SESSION['usuariologadoADM'] = '';
        $_SESSION['usuariologadoEDITOR'] = '';

        session_destroy();
    endif;

    
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['usuariologado'])==true):
    header('Location: /login.php');
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

     
      <style>
        
        .gradient-45deg-indigo-light-blue{
            background:-webkit-linear-gradient(45deg,#424242,#757575)!important;
            background:linear-gradient(45deg,#424242,#757575)!important      
        }

        

        .gradient-45deg-red-pink{
            background:-webkit-linear-gradient(45deg,#ff5252,#f48fb1)!important;
            background:linear-gradient(45deg,#ff5252,#f48fb1)!important
        }

        .grandiente-roxo-claro{
            background:-webkit-linear-gradient(45deg,#6a1b9a,#e1bee7)!important;
            background:linear-gradient(45deg,#6a1b9a,#e1bee7)!important
        }
  


        .grandientev-vermelho-claro{
            background:-webkit-linear-gradient(45deg,#e57373,#ffcdd2)!important;
            background:linear-gradient(45deg,#e57373,#ffcdd2)!important
        }

        .grandientev-rosa-claro{
            background:-webkit-linear-gradient(45deg,#c2185b,#f8bbd0)!important;
            background:linear-gradient(45deg,#c2185b,#f8bbd0)!important
        }

        .grandientev-roxo-claro{
            background:-webkit-linear-gradient(45deg,#7b1fa2 ,#e1bee7)!important;
            background:linear-gradient(45deg,#7b1fa2 ,#e1bee7)!important
        }

        .grandientev-azul-roxo-claro{
            background:-webkit-linear-gradient(45deg,#512da8 ,#d1c4e9)!important;
            background:linear-gradient(45deg,#512da8 ,#d1c4e9)!important
        }
            
        .grandientev-indigo-claro{
            background:-webkit-linear-gradient(45deg,#303f9f  ,#c5cae9)!important;
            background:linear-gradient(45deg,#303f9f  ,#c5cae9)!important
        }

        .grandientev-azul-claro{
            background:-webkit-linear-gradient(45deg,#1976d2   ,#bbdefb )!important;
            background:linear-gradient(45deg,#1976d2   ,#bbdefb )!important
        }

        .grandientev-teal-claro{
            background:-webkit-linear-gradient(45deg,#00796b,#b2dfdb  )!important;
            background:linear-gradient(45deg,#00796b,#b2dfdb  )!important
        }

        .grandientev-laranja-claro{
            background:-webkit-linear-gradient(45deg,#e64a19 ,#ffccbc   )!important;
            background:linear-gradient(45deg,#e64a19 ,#ffccbc   )!important
        }
        
        .grandientev-cyan-claro{
            background:-webkit-linear-gradient(45deg,#0097a7  ,#b2ebf2    )!important;
            background:linear-gradient(45deg,#0097a7  ,#b2ebf2    )!important
        }
        
        .grandientev-lime-claro{
            background:-webkit-linear-gradient(45deg,#afb42b   ,#f0f4c3     )!important;
            background:linear-gradient(45deg,#afb42b   ,#f0f4c3     )!important
        }

        .grandientev-verde-claro{
            background:-webkit-linear-gradient(45deg,#689f38    ,#dcedc8      )!important;
            background:linear-gradient(45deg,#689f38    ,#dcedc8      )!important
        }

        .grandientev-marrom-claro{
            background:-webkit-linear-gradient(45deg,#5d4037     ,#d7ccc8       )!important;
            background:linear-gradient(45deg,#5d4037     ,#d7ccc8       )!important
        }
        
        .theme-cutomizer-trigger{
            position:fixed;
            z-index:99;
            top:40%;
            right:-2px
        }

        .btn-customizer{padding:0 1rem}
        
        .btn-customizer i{-webkit-animation:fa-spin 2s infinite linear;animation:fa-spin 2s infinite linear}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}

        
        .menu-color-option{
          display:inline-block;
          width:14px;
          height:14px;
          margin-right:8px;
          margin-bottom:10px;
          cursor:pointer;
          border:1px solid #fff;
          border-radius:12px
        }

        </style>

        <script>

          function criarAbrirBanco() {
          banco = openDatabase('ProResumo','1.0','Tabelas Acessorios', 2 * 1024 * 1024);
         
          criarTabelas();
          }
          

          function criarTabelas() {
            banco.transaction(function (tx) {
              tx.executeSql('create table if not exists TCores (cor text)',
              //tx.executeSql('drop table TCores',
              [],
              function (tx) {},
              );
            });
          }

          function inserirCor(nomeDaCor) {
            criarAbrirBanco();
            deletarCor();  
                banco.transaction(function (tx) {
                  
                  tx.executeSql('insert into TCores (cor) values (?)',
                  [nomeDaCor],
                  function (tx) {},);
                });
          }

          function deletarCor() {
                banco.transaction(function (tx) {
                  tx.executeSql('delete from TCores',
                  [],
                  
                  function (tx) {},);
                });
          }

          function montaCor() {
            var corEscolhida = "";
            criarAbrirBanco();
            banco.transaction(function (tx) {
              tx.executeSql('select * from TCores ',
              [],
              function (tx, results) {
                var tamanho = results.rows.length;
                
                for(i=0; i < tamanho; i++) {
                  item = results.rows.item(i);
                  //corEscolhida = item['cor'];
                  trocarCorDefinitivo(item['cor']);
                }
              },);
            });
            //trocarCorDefinitivo(corEscolhida);
          }

          function trocarCor(nomeDaCor) {
              inserirCor(nomeDaCor);
              
              var divPrincipal = document.getElementById('divPrincipal');
              divPrincipal.className = "col s12 m6 push-m3 nav-wrapper  " + nomeDaCor;

              var divPesquisaPrincipal = document.getElementById('divPesquisaPrincipal');
              divPesquisaPrincipal.className = "nav-wrapper  " + nomeDaCor;

              var divFooterPrincipal = document.getElementById('divFooterPrincipal');
              divFooterPrincipal.className = "page-footer footer  " + nomeDaCor;
              
          }

          function trocarCorDefinitivo(nomeDaCor) {
              
              var divPrincipal = document.getElementById('divPrincipal');
              divPrincipal.className = "col s12 m6 push-m3 nav-wrapper  " + nomeDaCor;

              var divPesquisaPrincipal = document.getElementById('divPesquisaPrincipal');
              divPesquisaPrincipal.className = "nav-wrapper  " + nomeDaCor;

              var divFooterPrincipal = document.getElementById('divFooterPrincipal');
              divFooterPrincipal.className = "page-footer footer  " + nomeDaCor;
              
          }

            
        
         
        </script> 

      
      </head>

    <body onload="montaCor()">

      
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
  <div id="divPrincipal" class="col s12 m6 push-m3 nav-wrapper gradient-45deg-indigo-light-blue">
      <a href="#!" class="brand-logo">Pro Resumos</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          
      
        
      <ul class="right hide-on-med-and-down">
        <li> <a href="/index.php" class=""> Inicio </a>     </li>
        
        <li><a class="dropdown-trigger" href="#!" data-target="dropdownCategoria1">Lista de Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
        
        <?php 
          if ($_SESSION['usuariologadoADM']=='1'): ?>
          <li> <a href="/categorias/categorias.php" class="waves-effect"> Cadastro de Categorias </a>     </li>
          
          <li> <a href="/publicacoes/publicacoes.php" class=""> Publicacões </a>     </li>
          <li> <a href="/usuarios/usuarios.php"    class="waves-effect"> Usuarios </a>     </li>
          
        <?php 
          endif;    
        ?>

        

        <?php 
          if ($_SESSION['usuariologadoADM']==''):
            if ($_SESSION['usuariologadoEDITOR']=='S'): ?>
          <li> <a href="/publicacoes/publicacoes.php" class=""> Publicacões </a>     </li>
        <?php 
            endif;
          endif;    
        ?>
        <li> <a href="/editores/conteudoEditores.php"                   class="waves-effect"> Editores </a>     </li>
    
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
        <a href="#user"><img class="circle" src="/images/dente.png"></a>           

        <a href="#name"><span class="white-text name"><?php echo $_SESSION['usuariologadoNome'] ?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $_SESSION['usuariologadoEmail'] ?></span></a>
      </div>
    </li>

   
    <li><a class="subheader"><i class="material-icons">list</i>Menu</a></li>
    <li><div class="divider"></div></li>
    <li> <a href="/index.php"                   class="waves-effect"> Inicio </a>     </li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdownCategoria">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
    
    <?php 
      if ($_SESSION['usuariologadoADM']=='1'): ?>
      <li> <a href="/categorias/categorias.php" class="waves-effect"> Cadastro de Categorias </a>     </li>
      
      <li> <a href="/publicacoes/publicacoes.php" class="waves-effect"> Publicacões </a>     </li>
      <li> <a href="/usuarios/usuarios.php"    class="waves-effect"> Usuarios </a>     </li>
    <?php 
      endif;    
    ?>
        <?php 
          if ($_SESSION['usuariologadoADM']==''):
            if ($_SESSION['usuariologadoEDITOR']=='S'): ?>
          <li> <a href="/publicacoes/publicacoes.php" class=""> Publicacões </a>     </li>
        <?php 
            endif;
          endif;    
        ?>
    <li> <a href="/editores/conteudoEditores.php"                   class="waves-effect"> Editores </a>     </li>
    

    <li><div class="divider"></div></li>
    <li> <a href="?deslogar"  class="waves-effect btn red"> Sair </a>     </li>
    <li><div class="divider"></div></li>      
   


  </ul>
  
 

  