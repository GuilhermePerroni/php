<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes/header.php';
require_once '../conexao/db_connect.php';
require_once 'classe/classeEditores.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $usuarioEditor = new UsuarioEditor();
        
                if (isset($_GET['editar'])): 
                    echo "Editar Curriculo";
                
                    $usuarioEditor->buscarUsuario(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                
            ?>
        </h3>

        <form action="classe/controllerEditores.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $usuarioEditor->id; ?>" >
                <label for="id"> ID: <?php echo $usuarioEditor->id; ?> </label>
            </div>

            <br><br>

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $usuarioEditor->nome; ?>  "   >
                <label for="nome"> Nome </label>
            </div>
            <br><br><br>

            <textarea rows="50" cols="80" name="curriculo" id="curriculo" value="" > <?php echo $usuarioEditor->curriculo; ?>
            
            </textarea>
            <script>   
                CKEDITOR.replace('curriculo');
            </script>

            <div class="input-field col s12">
                <input class="validate"  type="email" name="email" id="email" value="<?php echo $usuarioEditor->email; ?>" >
                <label for="email"> E-mail </label>
            </div>

            <?php 
                  if (isset($_GET['editar'])): ?>
                    <button type="submit" class="btn orange" name="btn-editar"> Editar </button>
            <?php endif; ?>
                  
        
            <a href="editores.php" class="btn green"> Lista de Usuarios </a>

        </form>
    
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     