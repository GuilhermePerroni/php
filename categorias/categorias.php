<?php

if (!isset($_SESSION)) session_start(); 

if ($_SESSION['usuariologadoADM']!='1'):
	header('Location: /index.php');
endif;

include_once '../conexao/db_connect.php';
include_once '../includes/header.php';
include_once '../includes/message.php';
require_once 'classe/classeCategoria.php';

?>




<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Categorias </h3>
		<table class="col s12 striped " >
			<thead>

				<th> Nº: </th>
				<th> Descrição: </th>
				<th> Cor: </th>
				<th> ------ </th>
				<th> ------ </th>
			</thead>
				
			<tbody  >
				<?php

					$categoria = new Categoria();
					$resultado = $categoria->buscarTodosCategorias();

					
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
				?>
					<tr >
						<td> <?php echo $dados['id']; ?> </td>
						<td> <?php echo $dados['descricao']; ?> </td>
						<td> <?php echo $dados['cor']; ?> </td>
						<td> <a href="formularioCategoria.php?editar=<?php echo $dados['id']; ?>" class="btn-floating orange"> <i class="material-icons"> edit </i>  </a> </td>
						<td> <a href="formularioCategoria.php?excluir=<?php echo $dados['id']; ?>" class="btn-floating red"> <i class="material-icons"> delete </i>  </a> </td>
						
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
		<a href="formularioCategoria.php?novo" class="btn" name="btn-controle"> Adicionar Categoria </a>
	</div>

	<script>
					

    </script>


</div>

<?php

include_once '../includes\footer.php';
?>
     