<?php



//if (!isset($_SESSION)) session_start();

//if (!isset($_SESSION['usuariologado'])==true):
//    header('Location: login.php');
//    session_destroy();
//endif;

//require_once(__ROOT__.'/conexao\db_connect.php');
include_once 'conexao/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
require_once 'publicacoes/classe/classePublicacoes.php';

?>
<a href="#" data-target="slide-out" class="btn btn-customizer gradient-45deg-indigo-light-blue accent-2 white-text sidenav-trigger theme-cutomizer-trigger"><i class="material-icons">settings</i></a>


    <ul id="slide-out" class="sidenav">
    <div class="container">
        
        <li>Escolha as Cores</li>
        <span onclick="trocarCor('gradient-45deg-indigo-light-blue')" class="menu-color-option gradient-45deg-indigo-light-blue " >  </span>    
        <span onclick="trocarCor('grandientev-vermelho-claro')" class="menu-color-option grandientev-vermelho-claro " >  </span> 
        <span onclick="trocarCor('grandientev-rosa-claro')" class="menu-color-option grandientev-rosa-claro " > </span> 
        <span onclick="trocarCor('grandientev-roxo-claro ')" class="menu-color-option grandientev-roxo-claro " > </span> 
        <span onclick="trocarCor('grandientev-azul-roxo-claro')" class="menu-color-option grandientev-azul-roxo-claro " >  </span> 
        <span onclick="trocarCor('grandientev-indigo-claro')" class="menu-color-option grandientev-indigo-claro " >  </span> 
        <span onclick="trocarCor('grandientev-azul-claro')" class="menu-color-option grandientev-azul-claro" >  </span> 
        <span onclick="trocarCor('grandientev-teal-claro')" class="menu-color-option grandientev-teal-claro" >  </span> 
        <span onclick="trocarCor('grandientev-laranja-claro')" class="menu-color-option grandientev-laranja-claro " >  </span> 
        <span onclick="trocarCor('grandientev-cyan-claro')" class="menu-color-option grandientev-cyan-claro " > </span> 
        <span onclick="trocarCor('grandientev-lime-claro')" class="menu-color-option grandientev-lime-claro " > </span> 
        <span onclick="trocarCor('grandientev-verde-claro')" class="menu-color-option grandientev-verde-claro " > </span> 
        <span onclick="trocarCor('grandientev-marrom-claro')" class="menu-color-option grandientev-marrom-claro " > </span> 
    </div>   
    </ul>


<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Ultimas Atualizações </h3>
        
        <nav>
            <div id="divPesquisaPrincipal" class="nav-wrapper gradient-45deg-indigo-light-blue ">
            <form action="?pesquisaIncremental" method="POST" >
                <div class="input-field">
                <input name="search" id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                </div>
            </form>
            </div>
        </nav>
		
			<thead>
			</thead>

            <?php
                 //echo 'Current PHP version: ' . phpversion();
                $publicacoes = new Publicacoes();
                    if (isset($_GET['buscaCategoriaEspecifica'])): 
                        $resultado = $publicacoes->buscarPublicacaoPorCategoria(mysqli_escape_string($connect, $_GET['buscaCategoriaEspecifica']));
                    else: 
                        $resultado = $publicacoes->buscarTodosPublicacoesGeral();
                    endif;

                    if (isset($_GET['pesquisaIncremental'])): 
                        $resultado = $publicacoes->buscarPublicacaoPesquisaIncremental(mysqli_escape_string($connect, $_POST['search']));
                    endif;
                

                    
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
			?>
		
                  
            <div class="row">
                <div class="col s12 m12"  >
                <div class="card <?php if($dados['nomeCor']!=""): echo $dados['nomeCor']; endif;  ?>   style="background-color: #f44336;" >
                    <div class="card-content white-text">
                    <span class="card-title"><?php echo $dados['titulo']; ?></span>
                    <p> Publicação feita dia: <?php echo  date("d/m/Y", strtotime($dados['dataLancamento'])) ?> </p>
                    <p> Na Categoria: <?php echo $dados['nomeCategoria']; ?> </p>
                    <p> Autor: <?php echo $dados['nomeUsuario']; ?> </p>
                    
                    </div>
                    <div class="card-action">
                    <a href="/publicacoes/conteudoPublicacoes.php?visualizar=<?php echo $dados['id']; ?>" class="btn-floating grey darken-3 "> <i class="material-icons"> visibility </i>  </a> </td>
                    </div>
                </div>
                </div>
            </div>

            <?php 
					endwhile; 
                endif; 
				?>



		
		<br>
	</div>

</div>





















<?php


include_once 'includes/footer.php';
?>
     