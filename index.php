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

<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Ultimas Atualizações </h3>
        
        <nav>
            <div class="nav-wrapper grey darken-3 ">
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
     