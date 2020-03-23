<?php
include_once '../conexao\db_connect.php';
include_once '../includes\header.php';
include_once '../includes\message.php';
require_once 'classe/classeUsuario.php';
?>




<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Usuários </h3>
		<table class="col s12 striped " >
			<thead>

				<th> Nº: </th>
				<th> Nome: </th>
				<th> Senha: </th>
				<th> Email: </th>
				<th> Editor: </th>
				<th> ------ </th>
				<th> ------ </th>
			</thead>
				
			<tbody  >
				<?php

					$usuario = new Usuario();
					$resultado = $usuario->buscarTodosUsuarios();

					
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
				?>
					<tr >
						<td> <?php echo $dados['id']; ?> </td>
						<td> <?php echo $dados['nome']; ?> </td>
						<td> <?php echo $dados['senha']; ?> </td>
						<td> <?php echo $dados['email']; ?> </td>
						<td> <?php echo $dados['editor']; ?> </td>
						<td> <a href="formularioUsuario.php?editar=<?php echo $dados['id']; ?>" class="btn-floating orange"> <i class="material-icons"> edit </i>  </a> </td>
						<td> <a href="formularioUsuario.php?excluir=<?php echo $dados['id']; ?>" class="btn-floating red"> <i class="material-icons"> delete </i>  </a> </td>
						
					</tr>
				<?php 
					endwhile; 
					else: 
				?> 
					<tr>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>

				<?php
					endif;
				?>



			</tbody>
		</table>
		<br>
		<a href="formularioUsuario.php?novo" class="btn" name="btn-controle"> Adicionar Usuario </a>
	</div>

	<script>
					

    </script>


</div>

<?php

include_once '../includes\footer.php';
?>
     