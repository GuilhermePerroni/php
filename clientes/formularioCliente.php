<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes\header.php';
require_once '../conexao\db_connect.php';
require_once 'classe/classeCliente.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $cliente = new Cliente();
                if (isset($_GET['novo'])): 
                    echo "Novo Cliente";
                endif;
                if (isset($_GET['editar'])): 
                    echo "Editar Cliente";
                
                    $cliente->buscarCliente(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                if (isset($_GET['excluir'])): 
                    echo "Excluir Cliente"; 

                    $cliente->buscarCliente(mysqli_escape_string($connect, $_GET['excluir']));
                endif;
            ?>
        </h3>

        <form action="classe/controllerCliente.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $cliente->id; ?>" >
                <label for="id"> ID: <?php echo $cliente->id; ?> </label>
            </div>
            <br><br>

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $cliente->nome; ?>  "   >
                <label for="nome"> Nome </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $cliente->sobrenome; ?>" >
                <label for="sobrenome"> Sobrenome </label>
            </div>

            <div class="input-field col s12">
                <input class="validate"  type="email" name="email" id="email" value="<?php echo $cliente->email; ?>" >
                <label for="email"> E-mail </label>
            </div>

            <div class="input-field col s12">
                <input class="validate" type="number" name="idade" id="idade" value="<?php echo $cliente->idade; ?>" >
                <label for="idade"> Idade </label>
            </div>

            <?php 
                  if (isset($_GET['novo'])): ?>
                    <button type="submit" class="btn" name="btn-cadastrar"> Cadastrar </button>
            <?php endif;
                  if (isset($_GET['editar'])): ?>
                    <button type="submit" class="btn orange" name="btn-editar"> Editar </button>
            <?php endif;
                  if (isset($_GET['excluir'])): ?>  
                    <button type="submit" class="btn red" name="btn-excluir"> Excluir </button>
            <?php endif; ?>
        
            <a href="clientes.php" class="btn green"> Lista de Clientes </a>

        </form>
    
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     