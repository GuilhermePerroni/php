<?php


if (!isset($_SESSION)) session_start(); 

//if ($_SESSION['usuariologadoADM']!='1'):
//	header('Location: /index.php');
//endif;

include_once '../conexao/db_connect.php';
include_once '../includes/header.php';
include_once '../includes/message.php';
require_once 'classe/classeEditores.php';
?>




<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Usuários </h3>
		<table class="col s12 striped " >
			<thead>

				<th> Nº: </th>
				<th> Nome: </th>
				<th> Curriculo: </th>
				<th> Email: </th>
				<th> ------ </th>
				
			</thead>
				
			<tbody  >
				<?php
					
					$usuarioEditor = new UsuarioEditor();
					$resultado = $usuarioEditor->buscarUsuario($_SESSION['usuariologadoId']); ?>

					
				
					<tr >
						<td> <?php echo $usuarioEditor->id; ?> </td>
						<td> <?php echo $usuarioEditor->nome; ?> </td>
						<td> <?php echo $usuarioEditor->curriculo; ?> </td>						
						<td> <?php echo $usuarioEditor->email; ?> </td>
					
						<td> <a href="formularioEditores.php?editar=<?php echo $usuarioEditor->id; ?>" class="btn-floating orange"> <i class="material-icons"> edit </i>  </a> </td>
						
					</tr>
			
				



			</tbody>
		</table>
		<br>
		
	</div>

	<script>
					

    </script>


</div>

<?php

include_once '../includes\footer.php';
?>
     