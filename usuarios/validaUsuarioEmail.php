<?php


if (!isset($_SESSION)) session_start(); 

//if ($_SESSION['usuariologadoADM']!='1'):
//	header('Location: /index.php');
//endif;

include_once '../conexao/db_connect.php';
include_once '../includes/header.php';
include_once '../includes/message.php';
require_once 'classe/classeUsuario.php';
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
				
				
			</thead>
				
			<tbody  >
				<?php
					
					$usuario = new Usuario();
					$resultado = $usuario->buscarUsuario($_GET['usuarioValidar']);
					$resultado = $usuario->validarUsuario($_GET['usuarioValidar']); 

					//http://proresumos.xyz/usuarios/validaUsuarioEmail.php?usuarioValidar=7
					?>

					
				
					<tr >
						<td> <?php echo $usuario->id; ?> </td>
						<td> <?php echo $usuario->nome; ?> </td>						
						<td> <?php echo $usuario->email; ?> </td>
						<td> Usuario Validado com Sucesso! </td>
					
					</tr>
			
			</tbody>
		</table>
		<br>
	</div>
</div>

<?php

include_once '../includes\footer.php';
?>
     