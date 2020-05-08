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
                <span  onclick="trocarCor('red lighten-2')"  class="menu-color-option red lighten-2 " >  </span> 
                <span  onclick="trocarCor('pink darken-2')"  class="menu-color-option pink darken-2 " >  </span>
                <span  onclick="trocarCor('purple darken-2')"  class="menu-color-option purple darken-2 " >  </span>
                <span  onclick="trocarCor('deep-purple darken-2')"  class="menu-color-option deep-purple darken-2 " >  </span>
                <span  onclick="trocarCor('indigo darken-2')"  class="menu-color-option indigo darken-2 " >  </span>
                <span  onclick="trocarCor('blue darken-2')"  class="menu-color-option blue darken-2 " >  </span>
                <span  onclick="trocarCor(' teal darken-2')"  class="menu-color-option teal darken-2 " >  </span>
                <span  onclick="trocarCor('deep-orange darken-2')"  class="menu-color-option deep-orange darken-2 " >  </span>
                <span  onclick="trocarCor('cyan darken-2 ')"  class="menu-color-option cyan darken-2 " >  </span>
                <span  onclick="trocarCor('lime darken-2')"  class="menu-color-option lime darken-2 " >  </span>
                <span  onclick="trocarCor('light-green darken-2')"  class="menu-color-option light-green darken-2 " > </span>
                <span  onclick="trocarCor(' brown darken-2')"  class="menu-color-option brown darken-2 " > </span>

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

    <div class="carousel ">
            <?php
					$categoria = new Categoria();
					$resultado1 = $categoria->buscarTodosCategorias();
					if (mysqli_num_rows($resultado1) > 0 ): 
						while($dadosCat = mysqli_fetch_array($resultado1)):
				?>
					<a class="carousel-item  btn <?php echo $dadosCat['cor']; ?>" href="/index.php?buscaCategoriaEspecifica=<?php echo $dadosCat['id']; ?>"><br><br><?php echo $dadosCat['descricao']; ?></a>
				<?php 
					endwhile;
					endif;
				?>
    </div>    
	
        
        <h3 class="light"> Ultimas Atualizações </h3>
        <nav>
            <div id="divPesquisaPrincipal" class="nav-wrapper indigo darken-2 ">
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
     