<?php
include_once '../conexao\db_connect.php';
include_once '../includes\header.php';
include_once '../includes\message.php';
require_once 'classe/classePublicacoes.php';
?>




<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Publicacões </h3>
		<table class="col s12 striped " >
			<thead>

				<th> Nº: </th>
				<th> Titulo: </th>
				<th> Tags: </th>
				<th> Categoria: </th>
				<th> Autor: </th>
				
				<th> ------ </th>
				<th> ------ </th>
			</thead>
				
			<tbody  >
				<?php

					$publicacoes = new Publicacoes();
					$resultado = $publicacoes->buscarTodosPublicacoes();

					
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
				?>
					<tr >
						<td> <?php echo $dados['id']; ?> </td>
						<td> <?php echo $dados['titulo']; ?> </td>
						<td> <?php echo $dados['tags']; ?> </td>
						<td> <?php echo $dados['nomeCategoria']; ?> </td>
						<td> <?php echo $dados['nomeUsuario']; ?> </td>
						<td> <a href="formularioPublicacoes.php?editar=<?php echo $dados['id']; ?>" class="btn-floating orange"> <i class="material-icons"> edit </i>  </a> </td>
						<td> <a href="formularioPublicacoes.php?excluir=<?php echo $dados['id']; ?>" class="btn-floating red"> <i class="material-icons"> delete </i>  </a> </td>
						
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
		<a href="formularioPublicacoes.php?novo" class="btn" name="btn-controle"> Adicionar Publicação </a>
	</div>

	<script>
					

    </script>


</div>

<?php

include_once '../includes\footer.php';
?>
     