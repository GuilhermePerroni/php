<?php

include_once 'conexao/db_connect.php';

include_once 'includes/message.php';
require_once 'usuarios/classe/classeUsuario.php';

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

      <!--<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>-->
      
      
      </head>
	  <body>




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

</body>
   </html>     