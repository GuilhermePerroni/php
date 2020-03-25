<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes/header.php';
require_once '../conexao/db_connect.php';
require_once 'classe/classeUsuario.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $usuario = new Usuario();
                if (isset($_GET['novo'])): 
                    echo "Novo Usuario";
                endif;
                if (isset($_GET['editar'])): 
                    echo "Editar Usuario";
                
                    $usuario->buscarUsuario(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                if (isset($_GET['excluir'])): 
                    echo "Excluir Usuario"; 

                    $usuario->buscarUsuario(mysqli_escape_string($connect, $_GET['excluir']));
                endif;
            ?>
        </h3>

        <form action="classe/controllerUsuario.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $usuario->id; ?>" >
                <label for="id"> ID: <?php echo $usuario->id; ?> </label>
            </div>

            <br><br>

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $usuario->nome; ?>  "   >
                <label for="nome"> Nome </label>
            </div>

            <div class="input-field col s12">
                <input type="password" name="senha" id="senha" value="<?php echo $usuario->senha; ?>" >
                <label for="senha"> Senha </label>
            </div>

            <div class="input-field col s12">
                <input class="validate"  type="email" name="email" id="email" value="<?php echo $usuario->email; ?>" >
                <label for="email"> E-mail </label>
            </div>

            <div class="input-field col s12">
                <input class="validate" type="text" name="editor" id="editor" value="<?php echo $usuario->editor; ?>" >
                <label for="editor"> Editor </label>
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
        
            <a href="usuarios.php" class="btn green"> Lista de Usuarios </a>

        </form>
    
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     