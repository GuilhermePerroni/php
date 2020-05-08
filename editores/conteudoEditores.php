<?php

include_once '../conexao/db_connect.php';
include_once '../includes/header.php';
include_once '../includes/message.php';
require_once 'classe/classeEditores.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Editores </h3>
		
			<thead>
			</thead>
            <?php
                 //echo 'Current PHP version: ' . phpversion();
                $usuarioEditor = new UsuarioEditor();
                $resultado = $usuarioEditor->buscarTodosUsuarios();
                    
                    
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
			?>
		
                  
            <div class="row">
                <div class="col s12 m12"  >
                <div class="card white " >
                    <div class="card-content black-text">
                    <span class="card-title"><?php echo $dados['nome']; ?></span>
                    <p> <?php echo  $dados['email']; ?> </p>
                    <p> Curriculo:<?php echo $dados['curriculo']; ?> </p>
                    
                    </div>
                    <div class="card-action">
                    <?php if($dados['id']==$_SESSION['usuariologadoId'] || $_SESSION['usuariologadoADM']=='1'):   ?>
                    <a href="formularioEditores.php?editar=<?php echo $dados['id']; ?>" class="btn-floating grey darken-3 "> <i class="material-icons"> edit </i>  </a> </td>
                    <?php endif; ?>

                    
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


include_once '../includes/footer.php';
?>
     