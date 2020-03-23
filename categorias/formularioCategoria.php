<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes\header.php';
require_once '../conexao\db_connect.php';
require_once 'classe/classeCategoria.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $categoria = new Categoria();
                if (isset($_GET['novo'])): 
                    echo "Nova Categoria";
                endif;
                if (isset($_GET['editar'])): 
                    echo "Editar Categoria";
                
                    $categoria->buscarCategoria(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                if (isset($_GET['excluir'])): 
                    echo "Excluir Categoria"; 

                    $categoria->buscarCategoria(mysqli_escape_string($connect, $_GET['excluir']));
                endif;
            ?>
        </h3>

        <form action="classe/controllerCategoria.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $categoria->id; ?>" >
                <label for="id"> ID: <?php echo $categoria->id; ?> </label>
            </div>

            <br><br>

            <div class="input-field col s12">
                <input type="text" name="descricao" id="descricao" value="<?php echo $categoria->descricao; ?>  "   >
                <label for="descricao"> Descricao </label>
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
        
            <a href="categorias.php" class="btn green"> Lista de Categorias </a>

        </form>
    
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     