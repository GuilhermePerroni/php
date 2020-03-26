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
                $usuario = new Usuario();
                $resultado = $usuario->buscarTodosUsuarios();
                    
                    
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
			?>
		
                  
            <div class="row">
                <div class="col s12 m12"  >
                <div class="card teal lighten-2 " >
                    <div class="card-content white-text">
                    <span class="card-title"><?php echo $dados['nome']; ?></span>
                    <p> <?php echo  $dados['email']; ?> </p>
                    <p> Curriculo:<?php echo $dados['curriculo']; ?> </p>
                    
                    </div>
                    <div class="card-action">
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
     