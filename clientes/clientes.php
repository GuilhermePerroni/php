<?php
include_once '../conexao\db_connect.php';
include_once '../includes\header.php';
include_once '../includes\message.php';
require_once 'classe/classeCliente.php';
?>




<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Clientes </h3>
		<table class="col s12 striped " id="tamanholinha" >
			<thead>
				<th> Nº: </th>
				<th> Nome: </th>
				<th> SobreNome: </th>
				<th> Email: </th>
				<th> Idade: </th>
				<th> ------ </th>
				<th> ------ </th>
			</thead>
				
			<tbody  >
				<?php

					$cliente = new Cliente();
					$resultado = $cliente->buscarTodosClientes();

					
					if (mysqli_num_rows($resultado) > 0 ): 

						while($dados = mysqli_fetch_array($resultado)):
				?>
					<tr >
						<td> <?php echo $dados['id']; ?> </td>
						<td> <?php echo $dados['nome']; ?> </td>
						<td> <?php echo $dados['sobrenome']; ?> </td>
						<td width="1"> <?php echo $dados['email']; ?> </td>
						<td> <?php echo $dados['idade']; ?> </td>
						<td> <a href="formularioCliente.php?editar=<?php echo $dados['id']; ?>" class="btn-floating orange"> <i class="material-icons"> edit </i>  </a> </td>
						<td> <a href="formularioCliente.php?excluir=<?php echo $dados['id']; ?>" class="btn-floating red"> <i class="material-icons"> delete </i>  </a> </td>
						
							
					
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
		<a href="formularioCliente.php?novo" class="btn" name="btn-controle"> Adicionar Cliente </a>
	</div>

	<script>
	
		/*var divisoria = document.getElementById('testenav');


		var windowWidth = window.innerWidth;
  		var windowHeight = window.innerHeight;
  
  		var screenWidth = screen.width;
  		var screenHeight = screen.height;

		alert(screenWidth);
		alert(windowWidth);
		
		divisoria.style.width = windowWidth+'px';
	cruds	
resumaodadonto

		*/

	
					

    </script>


</div>

<?php

include_once '../includes\footer.php';
?>
     